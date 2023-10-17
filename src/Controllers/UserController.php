<?php
/**
 * This file is part of the Igitt package.
 *
 * (c) Hiren Chhatbar <hc.rajkot@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hiren\Igitt\Controllers;

use Hiren\Igitt\Models\User;
use Hiren\Igitt\Validators\UserPostValidator;
use Hiren\Igitt\Validators\UserPutValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * UserController class
 *
 * @author Hiren Chhatbar <hc.rajkot@gmail.com>
 */
class UserController extends AbstractCrudController
{
    /**
     * Constructor
     *
     * @param UserPostValidator $userPostValidator
     * @param UserPutValidator $userPutValidator
     */
    public function __construct(
        protected UserPostValidator $userPostValidator,
        protected UserPutValidator $userPutValidator,
        protected User $userModel,
    )
    {

    }

    /**
     * @inheritDoc
     */
    public function getCollection(Request $request): JsonResponse
    {
        $collection = $this->userModel->getCollection($request->query('page_params'), $request->query('filter', []), $request->query('sort_params', []));

        return response()->json($collection);
    }

    /**
     * @inheritDoc
     */
    public function get(int $id): JsonResponse
    {
        try {
            return response()->json($this->userModel->query()->findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(status: 404);
        }
    }

    /**
     * @inheritDoc
     */
    public function post(Request $request): JsonResponse
    {
        try {
            $this->validate($request, $this->userPostValidator->rules());

            if ($user = $this->userModel->post($request->request->all())) {
                return response()->json(['id' => $user->id], 201);
            }
        } catch (\Illuminate\Database\UniqueConstraintViolationException $e) {
            return response()->json(status: 409);
        }
    }

    /**
     * @inheritDoc
     */
    public function put(Request $request, int $id): JsonResponse
    {
        try {
            $this->validate($request, $this->userPutValidator->setId($id)->rules());

            if ($user = $this->userModel->put($id, $request->request->all())) {
                return response()->json(['id' => $user->id], 200);
            }
        } catch (\Illuminate\Database\UniqueConstraintViolationException $e) {
            return response()->json(status: 409);
        }
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): JsonResponse
    {
        try {
            $this->userModel->deleteById($id);

            return response()->json();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(status: 404);
        }
    }
}