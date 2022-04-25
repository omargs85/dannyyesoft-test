<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaCorporativoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'S_RazonSocial' => $this->faker->company,
            'S_RFC'=> $this->faker->text(13),
            'S_Pais' => $this->faker->country,
            'S_Estado' => $this->faker->name,
            'S_Municipio' => $this->faker->name,
            'S_ColoniaLocalidad'=> $this->faker->name,
            'S_Domicilio'=> $this->faker->streetAddress,
            'S_CodigoPostal' => substr($this->faker->postcode, 0, 5),
            'S_UsoCFDI' => $this->faker->text(10),
            'S_UrlRFC' => $this->faker->imageUrl,
            'S_UrlActaConstitutiva' => $this->faker->imageUrl,
            'S_Activo' => true,
            'S_Comentarios' => $this->faker->text(200),
        ];
    }
}
