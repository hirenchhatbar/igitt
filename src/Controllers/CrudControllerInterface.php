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

    /**
     * The function handles the POST request for creating a new entity in a PHP application,
     * validating the request data and returning a JSON response with the created entity's ID.
     *
     * @param Request request The `` parameter is an instance of the `Illuminate\Http\Request`
     * class. It represents an incoming HTTP request and contains information such as the request
     * method, headers, and payload.
     *
     * @return JsonResponse If the validation passes and a new entity is successfully created, a JSON
     * response with the entity's ID and a status code of 201 (Created) is returned.
     */
    public function post(Request $request): JsonResponse;

    /**
    * The function takes a PUT request and updates a entity with the given ID, returning a JSON response
    * with the updated entity's ID if successful.
    *
    * @param Request request The `` parameter is an instance of the `Request` class, which
    * represents an HTTP request made to the server. It contains information about the request, such
    * as the request method, headers, and request data.
    * @param int id The `id` parameter is an integer that represents the ID of the entity that needs to
    * be updated.
    *
    * @return JsonResponse If the validation passes and the entity is successfully updated, a JSON
    * response with the entity's ID is returned with a status code of 200. If a unique constraint
    * violation occurs, a JSON response with a status code of 409 is returned.
    */
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