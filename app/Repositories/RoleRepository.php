<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepository extends ResourceRepository
{

    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    private function save(Role $role, Array $inputs)
    {
        $role->name = $inputs['name'];
        $role->description = $inputs['description'];

        try {
            $role->save();
            return $role;
        } catch (QueryException $e) {
            return false;
        }
    }

    public function getListe()
    {
        return $this->model->orderBy('description')->pluck('description', 'id');
    }

    public function store(Array $inputs)
    {
        $role = $this->save(new $this->model, $inputs);
        //Prise en compte des permissions
        if ($role && isset($inputs['permissions'])) {
            $this->setPermissions($role, $inputs['permissions']);
        }
        return $role;
    }

    public function update($id, Array $inputs)
    {
        $updatedRole = $this->save($this->getById($id), $inputs);
        //Prise en compte des permissions
        if ($updatedRole && isset($inputs['permissions'])) {
            $this->setPermissions($updatedRole, $inputs['permissions']);
        }
        return $updatedRole;
    }

    public function destroy($id)
    {
        $role = $this->getById($id);

        if (!empty($role->users->count()))
            return false;

        try {
            $role->delete();
            return true;
        } catch (QueryException $e) {
            return 'error';
        }
    }

    public function setPermissions($role, $permissions)
    {
        $tabPerms = array();
        foreach ($permissions as $idPerm) {
            if (is_numeric($idPerm))
                $tabPerms[] = Permission::findById($idPerm);
        }
        $role->syncPermissions($tabPerms);
        return true;
    }

}