<?php

namespace Hiren\ApiPlatform\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @inheritDoc
     */
    public $timestamps = true;

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
    public static function getCollection(array $page, array $filter = [], array $sort = [])
    {
        $query = self::query();

        if (isset($filter['name'])) {
            $query->where('name', 'like', '%' . $filter['name'] . '%');
        }

        if (isset($filter['status'])) {
            $query->where('status', '=', $filter['status']);
        }

        foreach ($sort as $sortField => $sortDirection) {
            $query->orderBy($sortField, $sortDirection);
        }

        $query->paginate(perPage: $page['per_page'], page: $page['page']);

        return $query->get();
    }

    /**
     * The function takes an array of data, creates a new instance of a class, sets its properties
     * based on the data, saves it to the database, and returns the instance.
     *
     * @param array data An array containing the data for creating a new role. The array should have
     * the following keys:
     *
     * @return static an instance of the class that the function is defined in.
     */
    public static function post(array $data): static
    {
        $role = (new static)->newInstance();

        $role->name = $data['name'];
        $role->code = \str_replace(' ', '_', \strtoupper($data['name']));
        $role->ord = $data['ord'];
        $role->status = $data['status'];

        $role->save();

        return $role;
    }
}