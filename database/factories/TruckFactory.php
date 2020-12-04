<?php

namespace Database\Factories;

use App\Models\Truck;
use Illuminate\Database\Eloquent\Factories\Factory;

class TruckFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Truck::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'registration_number' => $this->faker->regexify('T[1-9]{3}[A-Z]{3}'),
            'company_id' => $this->faker->numberBetween($min = 1, $max = 3),
            'truck_type_id' => $this->faker->numberBetween($min = 1, $max = 4),
            'activity_status_id' => 1,
        ];
    }
}
