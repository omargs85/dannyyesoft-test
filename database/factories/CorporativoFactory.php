<?php

namespace Database\Factories;

use App\Models\Corporativo;
use Illuminate\Database\Eloquent\Factories\Factory;

class CorporativoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Corporativo::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'S_NombreCorto' => $this->faker->firstName(),
            'S_NombreCompleto' => $this->faker->name,
            'S_LogoURL' => $this->faker->imageUrl(),
            'S_DBName' => $this->faker->domainName(),
            'S_DBUsuario' => $this->faker->userName(),
            'S_DBPassword' => $this->faker->password(),
            'S_SystemUrl' => $this->faker->url(),
            'S_Activo' => $this->faker->boolean(),
            'D_FechaIncorporacion' => $this->faker->date()
        ];
    }
}
