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
            'middle_name' => $this->faker->middleName,
            'last_name' => $this->faker->lastName,
            'dob' => $this->faker->address,
            'mobile' => $this->faker->phoneNumber,
            'start_date' => $this->faker->name,
            'company_id' => $this->faker->phoneNumber,
            'department_id' => $this->faker->freeEmail,
            'license_number' => $this->faker->freeEmail,
            'passport' => $this->faker->freeEmail,
            'license_issue_date' => $this->faker->freeEmail,
        ];
    }
}
