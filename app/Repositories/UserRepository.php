<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserRepository extends ResourceRepository
{
    const PWD = 'passer';

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    private function save(User $user, Array $inputs)
    {
        $user->email = $inputs['email'];
        $user->nom = $inputs['nom'];
        $user->prenom = $inputs['prenom'];
        $user->adresse = $inputs['adresse'];
        if (!empty($inputs['commune_id']))
        $user->commune_id = $inputs['commune_id'];
        if (!empty($inputs['avatar']))
            $user->avatar = $inputs['avatar'];

        try {
            $user->save();
            return $user;
        } catch (QueryException $e) {
            return false;
        }
    }

    public function getData()
    {
        return $this->model->orderBy('nom')->orderBy('prenom')->get();
    }

    public function store(Array $inputs)
    {
        $user = new $this->model;
        $pwd = self::PWD;
        if (!empty($inputs['password'])) $pwd = $inputs['password'];
        $user->password = password_hash($pwd, PASSWORD_BCRYPT);
        $user = $this->save($user, $inputs);
        //Prise en compte role
        if ($user && $inputs['roles']) {
            $this->setRoles($user, $inputs['roles']);
        }
        return $user;
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function getListe()
    {
        return $this->model->select(DB::raw("CONCAT(prenom,' ',nom) AS fullname"),'id')->orderBy('fullname')->pluck('fullname', 'id');
    }

    public function update($id, Array $inputs)
    {
        $userUpdated = $this->save($this->getById($id), $inputs);
        //Prise en compte role
        if ($userUpdated && $inputs['roles']) {
            $this->setRoles($userUpdated, $inputs['roles']);
        }
        return $userUpdated;
    }

    public function destroy($id)
    {
        $user = $this->getById($id);
        $user->statut = 0;
        $user->save();
        return true;
    }

    public function changePwd($user, $inputs)
    {
        if (password_verify($inputs['actuel_password'], $user->password)) {
            $hashedpassword = password_hash($inputs['nouveau_password'], PASSWORD_BCRYPT);
            $user->password = $hashedpassword;
            $user->save();
            return true;
        }
        return false;
    }

    public function updateProfile(User $user, array $inputs)
    {
        return $user->update($inputs);
    }

    public function updateAvatar($user, $nomAvatar)
    {
        $user->avatar = $nomAvatar;
        $user->save();
        return true;
    }

    public function setRole($user, $idRole)
    {
        $role = Role::findById($idRole);
        $user->syncRoles($role);
        return true;
    }

    public function setRoles($user, $roles)
    {
        $tabRoles = array();
        foreach ($roles as $idRole) {
            $tabRoles[] = Role::findById($idRole);
        }
        $user->syncRoles($tabRoles);
        return true;
    }

    public function getNb()
    {
        return $this->model->count();
    }

}
