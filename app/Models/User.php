<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $table = 'users';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'entite_id', 'adresse', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function commune()
    {
        return $this->belongsTo('App\Models\Commune\Commune');
    }

    /**
     * Genere l'attribut identite
     * @return bool
     */
    public function getIdentiteAttribute()
    {
        return $this->prenom . ' ' . strtoupper($this->nom);
    }

    public function scopeFilterByRole($query, $role)
    {
        return $query->whereHas('roles', function ($q) use ($role) {
            $q->where('roles.name', $role);
        });
    }

    public function scopeFilterByRoles($query, Array $roles)
    {
        return $query->whereHas('roles', function ($q) use ($roles) {
            $q->whereIn('roles.name', $roles);
        });
    }

    public function estAdmin()
    {
        if ($this->hasRole(Config::get('constants.roles.admin')))
            return true;
        else return false;
    }

}