<?php
namespace Hiren\Igitt\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface CrudControllerInterface
{
    /**
     * The function retrieves a collection of entity objects based on the provided request parameters and
     * returns it as a JSON response.
     *
     * @param Request request The `` parameter is an instance of the `Illuminate\Http\Request`
     * class. It represents an incoming HTTP request and contains information such as the request
     * method, headers, query parameters, and request body.
     *
     * @return JsonResponse A JsonResponse object is being returned.
     */
    public function getCollection(Request $request): JsonResponse;

    /**
     * The function retrieves a entity object with the specified ID and returns it as a JSON response, or
     * returns a 404 status code if the entity is not found.
     *
     * @param int id The "id" parameter is an integer that represents the unique identifier of a entity
     * in the database.
     *
     * @return JsonResponse a JsonResponse.
     */
    public function get(int $id): JsonResponse;

    public function post(Request $request): JsonResponse;

    public function put(Request $request, int $id): JsonResponse;

    /**
     * The function deletes a entity with the specified ID and returns an empty JSON response.
     *
     * @param int id The `id` parameter is the unique identifier of the entity that needs to be deleted.
     *
     * @return JsonResponse a JsonResponse.
     */
    public function delete(int $id): JsonResponse;
}