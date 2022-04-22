<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->userName(),
            'email' => $this->faker->companyEmail(),
            'S_Nombre' => $this->faker->firstName(),
            'S_Apellidos' => $this->faker->lastName(),
            'S_FotoPerfilUrl' => $this->faker->imageUrl(),
            'S_Activo' => $this->faker->boolean(),
            'password' => Hash::make('12345'),
            'verified' => '',
        ];
    }
}
