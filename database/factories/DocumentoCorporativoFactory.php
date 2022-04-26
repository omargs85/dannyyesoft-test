<?php

namespace Database\Factories;

use App\Models\DocumentoCorporativo;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentoCorporativoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DocumentoCorporativo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'S_ArchivoUrl' => $this->faker->imageUrl
        ];
    }
}
