<?php
namespace Hiren\Igitt\Controllers;

use App\Http\Controllers\Controller;
use Hiren\Igitt\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleController extends Controller implements CrudControllerInterface
{
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

    public function post(Request $request): JsonResponse
    {
        try {
            if ($role = Role::post($request->request->all())) {
                return response()->json(['id' => $role->id], 201);
            }
        } catch (\Illuminate\Database\UniqueConstraintViolationException $e) {
            return response()->json(status: 409);
        }
    }

    public function put(Request $request, int $id): JsonResponse
    {
        $user = ['user' => 'Peter Parker'];

        return response()->json($user);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): JsonResponse
    {
        try {
            $role = Role::findOrFail($id);

            $role->delete();

            return response()->json();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(status: 404);
        }
    }
}