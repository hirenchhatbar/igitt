<?php
namespace Hiren\ApiPlatform\Controllers;

use App\Http\Controllers\Controller;
use Hiren\ApiPlatform\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * The function retrieves a collection of Role objects based on the provided request parameters and
     * returns it as a JSON response.
     *
     * @param Request request The `` parameter is an instance of the `Illuminate\Http\Request`
     * class. It represents an incoming HTTP request and contains information such as the request
     * method, headers, query parameters, and request body.
     *
     * @return JsonResponse A JsonResponse object is being returned.
     */
    public function getCollection(Request $request): JsonResponse
    {
        $collection = Role::getCollection($request->query('page_params'), $request->query('filter', []), $request->query('sort_params', []));

        return response()->json($collection);
    }

    /**
     * The function retrieves a Role object with the specified ID and returns it as a JSON response, or
     * returns a 404 status code if the Role is not found.
     *
     * @param int id The "id" parameter is an integer that represents the unique identifier of a role
     * in the database.
     *
     * @return JsonResponse a JsonResponse.
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
     * The function deletes a role with the specified ID and returns an empty JSON response.
     *
     * @param int id The `id` parameter is the unique identifier of the role that needs to be deleted.
     *
     * @return JsonResponse a JsonResponse.
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