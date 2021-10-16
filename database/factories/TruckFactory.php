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
            'fleet_number' => $this->faker->numerify('###'),
            'registration_number' => $this->faker->regexify('T[1-9]{3}[A-Z]{3}'),
            'make_id' => $this->faker->numberBetween(1,3),
            'year_model' => $this->faker->year($max = 'now'),
            'chassis_number' => $this->faker->regexify('[A-Z]{4}[1-9]{8}'),
            'engine_size' => 300,
            'authorized_payload' => 25,
            'length' => 6.98,
            'width' => 2.5,
            'height' => 3.8,
            'fuel_capacity' => 770,
            'fuel_consumption' => 2.21,
            'transmission_type_id' => $this->faker->numberBetween(1,2),
            'fuel_type_id' => $this->faker->numberBetween(1,2),
            'make_id' => $this->faker->numberBetween(1,3),
            'company_id' => $this->faker->numberBetween(1, 3),
            'truck_type_id' => $this->faker->numberBetween(1, 4),
            'activity_status_id' => 1,
        ];
    }
}
