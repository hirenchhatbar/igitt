<?php

namespace Hiren\ApiPlatform\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @inheritDoc
     */
    public $timestamps = true;

    public static function getCollection(array $filters = [])
    {
        $query = self::query();

        if (isset($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (isset($filters['status'])) {
            $query->where('status', '=', $filters['status']);
        }

        $query->orderBy('ord', 'ASC');

        $query->paginate(perPage: 2, page: 1);

        return $query->get();
    }
}