<?php

namespace Database\Seeders;

use App\Models\ContactoCorporativo;
use App\Models\Corporativo;
use App\Models\EmpresaCorporativo;
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
        Corporativo::all()->each(function(Corporativo $corporativo) {
            ContactoCorporativo::factory(1)->create(['tw_corporativos_id' => $corporativo->id]);
            EmpresaCorporativo::factory(1)->create(['tw_corporativos_id' => $corporativo->id]);
        });
    }
}
