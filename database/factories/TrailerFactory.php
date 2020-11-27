<?php

namespace Database\Factories;

use App\Models\Trailer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrailerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trailer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'registrationNumber' => $this->faker->bothify('T###???'),
            'company_id' => $this->faker->numberBetween($min = 1, $max = 3),
            'cluster_id' => $this->faker->numberBetween($min = 1, $max = 2),
            'truck_type_id' => $this->faker->numberBetween($min = 1, $max = 4),
            'activity_status_id' => 1,
        ];
    }
}
