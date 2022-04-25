<?php

namespace Database\Seeders;

use App\Models\Corporativo;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::factory(10)->create()->each(function (Usuario $usuario) {
            Corporativo::query()->whereNull('tw_usuarios_id')->first()->update(['tw_usuarios_id' => $usuario->id]);
        });

        $user = Usuario::all()->last();
        $user->email = 'test_user@test.com';
        $user->save();
    }
}
