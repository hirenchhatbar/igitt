<?php

namespace Hiren\Igitt\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model implements CrudModelInterface
{
    /**
     * @inheritDoc
     */
    public $timestamps = true;

    /**
     * @inheritDoc
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
     * @inheritDoc
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

    /**
     * @inheritDoc
     */
    public static function deleteById(int $id): void
    {
        $role = static::findOrFail($id);

        $role->delete();
    }
}