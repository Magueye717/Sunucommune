<?php

use Illuminate\Database\Seeder;

class CommuneInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Commune\CommuneInfo::class, 1)->create();
    }
}
