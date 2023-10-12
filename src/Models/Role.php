<?php
/**
 * This file is part of the Igitt package.
 *
 * (c) Hiren Chhatbar <hc.rajkot@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hiren\Igitt\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Role class
 *
 * @author Hiren Chhatbar <hc.rajkot@gmail.com>
 */
class Role extends Model implements CrudModelInterface
{
    /**
     * @inheritDoc
     */
    public $timestamps = true;

    /**
     * @inheritDoc
     */
    public function getCollection(array $page, array $filter = [], array $sort = [])
    {
        $query = $this->newQuery();

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
    public function post(array $data): self
    {
        $role = $this->newInstance();

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
    public function put(int $id, array $data): self
    {
        $query = $this->newQuery();

        $role = $query->findOrFail($id);

        $role->name = $data['name'];
        $role->ord = $data['ord'];
        $role->status = $data['status'];

        $role->save();

        return $role;
    }

    /**
     * @inheritDoc
     */
    public function deleteById(int $id): void
    {
        $query = $this->newQuery();

        $role = $query->findOrFail($id);

        $role->delete();
    }
}