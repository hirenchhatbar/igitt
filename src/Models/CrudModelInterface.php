<?php

namespace Hiren\Igitt\Models;

interface CrudModelInterface
{
    /**
     * The function `getCollection` retrieves a collection of data from a database table based on
     * specified filters and sorting criteria, and returns the results paginated.
     *
     * @param array page The `page` parameter is an array that contains information about pagination.
     * It has two keys:
     * @param array filter The `` parameter is an optional array that allows you to filter the
     * collection based on certain criteria. In this case, it checks if the `name` key is set in the
     * `` array and if so, it adds a `where` clause to the query to filter by the `
     * @param array sort The `` parameter is an array that specifies the sorting criteria for the
     * query. Each key-value pair in the array represents a field to sort by and the direction of the
     * sorting.
     *
     * @return a collection of records from the database that match the given filter and sort criteria.
     */
    public static function getCollection(array $page, array $filter = [], array $sort = []);


    /**
     * The function takes an array of data, creates a new instance of a class, sets its properties
     * based on the data, saves it to the database, and returns the instance.
     *
     * @param array data An array containing the data for creating a new entity. The array should have
     * the following keys:
     *
     * @return static an instance of the class that the function is defined in.
     */
    public static function post(array $data): static;

    /**
     * The function deletes a record from the database based on the provided ID.
     *
     * @param int id The id parameter is an integer that represents the unique identifier of the entity
     * that needs to be deleted.
     *
     * @return void
     */
    public static function deleteById(int $id): void;
}