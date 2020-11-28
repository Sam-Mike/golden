<?php

namespace Database\Factories;

use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = People::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->lastName,
            'last_name' => $this->faker->lastName,
            'dob' => $this->faker->date($format = 'Y-m-d'),
            'mobile' => $this->faker->phoneNumber,
            'start_date' => $this->faker->date($format = 'Y-m-d'),
            'company_id' => $this->faker->numberBetween($min = 1, $max = 3),
            'department_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'role_position_id' => 1,
            'license_number' => $this->faker->numberBetween($min = 40000000, $max = 49999999),
            'license_class_id' => 3,
            'license_issue_date' => $this->faker->date($format = 'Y-m-d'),
            'license_expiry_date' => $this->faker->date($format = 'Y-m-d'),
            'passport_number' => $this->faker->numberBetween($min = 1000000000, $max = 1999999999),
            'activity_status_id' => 1,
        ];
    }
}
