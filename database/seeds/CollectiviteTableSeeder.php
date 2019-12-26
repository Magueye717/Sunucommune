<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectiviteTableSeeder extends Seeder
{

    public function run()
    {
        $sql = file_get_contents(database_path() . '/collectivites.sql');

        DB::statement($sql);
    }
}