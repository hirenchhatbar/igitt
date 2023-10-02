<?php

namespace Hiren\ApiPlatform\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @inheritDoc
     */
    public $timestamps = true;

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
}