<?php

namespace Database\Seeders;

use App\Models\Corporativo;
use App\Models\Documento;
use App\Models\DocumentoCorporativo;
use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documento::factory(10)->create();

        Corporativo::all()->each(function(Corporativo $corporativo) {
           $documento = Documento::find(rand(1,10));
           DocumentoCorporativo::factory()->createOne([
               'tw_corporativos_id' => $corporativo->id,
               'tw_documentos_id' => $documento->id
           ]);
        });
    }
}
