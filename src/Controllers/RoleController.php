<?php
namespace Hiren\ApiPlatform\Controllers;

use App\Http\Controllers\Controller;
use Hiren\ApiPlatform\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function getCollection(Request $request): JsonResponse
    {
        $collection = Role::getCollection($request->query());

        return response()->json($collection);
    }

    public function get(int $id): JsonResponse
    {
        $user = ['user' => 'Peter Parker'];

        return response()->json($user);
    }

    public function post(Request $request): JsonResponse
    {
        $user = ['user' => 'Peter Parker'];

        return response()->json($user);
    }

    public function put(Request $request, int $id): JsonResponse
    {
        $user = ['user' => 'Peter Parker'];

        return response()->json($user);
    }

    public function delete(int $id): JsonResponse
    {
        $user = ['user' => 'Peter Parker'];

        return response()->json($user);
    }
}