<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'registration_number' => $this->faker->regexify('T[1-9]{3}[A-Z]{3}'),
            'vehicle_make_id' => $this->faker->numberBetween(1,3),
            'year_model' => $this->faker->year($max = 'now'),
            'chassis_number' => $this->faker->regexify('[A-Z]{4}[1-9]{8}'),
            'model_configuration' =>'checking',
            'engine_size' => 300,
            'authorized_payload' => 25,
            'length' => 6.98,
            'width' => 2.5,
            'height' => 3.8,
            'fuel_capacity' => 770,
            'fuel_consumption' => 2.21,
            'vehicle_transmission_type_id' => $this->faker->numberBetween(1,2),
            'fuel_type_id' => $this->faker->numberBetween(1,2),
            'vehicle_make_id' => $this->faker->numberBetween(1,3),
            'company_id' => $this->faker->numberBetween(1, 3),
            'vehicle_type_id' => $this->faker->numberBetween(1, 4),
            'activity_status_id' => 1,
        ];
    }
}
