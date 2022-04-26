<?php

namespace Database\Factories;

use App\Models\ContactoCorporativo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactoCorporativoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactoCorporativo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'S_Nombre' => $this->faker->name(),
            'S_Puesto' => substr($this->faker->jobTitle(), 0, 45),
            'S_Comentarios' => $this->faker->text(),
            'N_TelefonoFijo' => substr($this->faker->phoneNumber(),0,11),
            'N_TelefonoMovil' => substr($this->faker->phoneNumber(),0,11),
            'S_Email' => $this->faker->email
        ];
    }
}
