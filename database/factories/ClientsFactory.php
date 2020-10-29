<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'clientNname' => $this->faker->client_name,
            'clientAddress' => $this->faker->address,
            'clientPhone' => $this->faker->phone,
            'clientContactPerson' => $this->faker->contact_name,
            'clientMobile' => $this->faker->mobile,
            'clientEmail' => $this->faker->email,
            'remember_token' => Str::random(10),

        ];
    }
}
