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
        $license_classes = array("classA" => "true", "classB" => "true", "classC" => "true", "classD" => "false", "classE" => "false", "classF" => "false");
        return [
            'employee_number' => $this->faker->ean13,
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->lastName,
            'last_name' => $this->faker->lastName,
            'dob' => $this->faker->date($format = 'Y-m-d'),
            'mobile' => $this->faker->phoneNumber,
            'start_date' => $this->faker->date($format = 'Y-m-d'),
            'company_id' => $this->faker->numberBetween($min = 1, $max = 3),
            'department_role_id' => 1,
            'nida_number' => $this->faker->ean13,
            'ss_number' => $this->faker->ean13,
            'tin_number' => $this->faker->ean13,
            'license_number' => $this->faker->ean13,
            'license_classes' => json_encode($license_classes),
            'license_issue_date' => $this->faker->date($format = 'Y-m-d'),
            'license_expiry_date' => $this->faker->date($format = 'Y-m-d'),
            'passport_number' => $this->faker->numberBetween($min = 1000000000, $max = 1999999999),
            'passport_issue_date' => $this->faker->date($format = 'Y-m-d'),
            'passport_expiry_date' => $this->faker->date($format = 'Y-m-d'),
            'next_kin_name' => $this->faker->name,
            'next_kin_mobile' => $this->faker->phoneNumber,
            'activity_status_id' => 1,
        ];
    }
}
