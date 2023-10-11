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

use Hiren\Igitt\Models\Role;
use Hiren\Igitt\Validators\RolePostValidator;
use Hiren\Igitt\Validators\RolePutValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * RoleController class
 *
 * @author Hiren Chhatbar <hc.rajkot@gmail.com>
 */
class RoleController extends AbstractCrudController
{
    /**
     * Constructor
     *
     * @param RolePostValidator $rolePostValidator
     * @param RolePutValidator $rolePutValidator
     */
    public function __construct(
        protected RolePostValidator $rolePostValidator,
        protected RolePutValidator $rolePutValidator,
    )
    {

    }

    /**
     * @inheritDoc
     */
    public function getCollection(Request $request): JsonResponse
    {
        $collection = Role::getCollection($request->query('page_params'), $request->query('filter', []), $request->query('sort_params', []));

        return response()->json($collection);
    }

    /**
     * @inheritDoc
     */
    public function get(int $id): JsonResponse
    {
        try {
            return response()->json(Role::findOrFail($id));
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
            $this->validate($request, $this->rolePostValidator->rules());

            if ($role = Role::post($request->request->all())) {
                return response()->json(['id' => $role->id], 201);
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
            $this->validate($request, $this->rolePutValidator->setId($id)->rules());

            if ($role = Role::put($id, $request->request->all())) {
                return response()->json(['id' => $role->id], 200);
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
            Role::deleteById($id);

            return response()->json();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(status: 404);
        }
    }
}