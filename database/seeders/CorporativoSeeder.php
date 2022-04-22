<?php

namespace Database\Seeders;

use App\Models\Corporativo;
use Illuminate\Database\Seeder;

class CorporativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Corporativo::factory(10)->create();
    }
}
