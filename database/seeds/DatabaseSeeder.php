<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('RoleAndPermissionTablesSeeder');
        $this->command->info('Role & Permission table seeded!');

        $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');

        $this->call('TypeArticleTableSeeder');
        $this->command->info('TypeArticle table seeded!');

        $this->call('CollectiviteTableSeeder');
        $this->command->info('Collectivite table seeded!');
<<<<<<< HEAD

=======
>>>>>>> 20e37450d1b5f8d54f3cbd1a85eab3a9fe670aa9
    }
}
