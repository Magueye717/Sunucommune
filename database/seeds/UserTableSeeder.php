<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        // admin
        $admin = User::create(array(
            'id' => '4',
            'email' => 'admin@system.sn',
            'nom' => 'System',
            'prenom' => 'Admin',
            'password' => bcrypt('passer'),
            'commune_id' => null
        ));
        $admin->assignRole('admin');

    }
}