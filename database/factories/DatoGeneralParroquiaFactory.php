<?php

namespace Database\Factories;

use App\Models\DatoGeneralParroquia;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatoGeneralParroquiaFactory extends Factory
{
    protected $model = DatoGeneralParroquia::class;

    public function definition()
    {
        return [
            'nombre_parroquia' => $this->faker->company . ' Parroquia',
            'direccion' => $this->faker->address,
            'num_telefono' => $this->faker->phoneNumber,
        ];
    }
}
