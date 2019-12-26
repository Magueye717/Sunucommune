<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission;

class PermissionRepository extends ResourceRepository
{

    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

    private function save(Permission $permission, Array $inputs)
    {
        $permission->description = $inputs['description'];

        try {
            $permission->save();
            return $permission;
        } catch (QueryException $e) {
            return false;
        }
    }

    public function getListe()
    {
        return $this->model->orderBy('description')->pluck('description', 'id');
    }

    public function update($id, Array $inputs)
    {
        return $this->save($this->getById($id), $inputs);
    }

}