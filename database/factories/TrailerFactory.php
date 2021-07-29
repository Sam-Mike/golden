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
            'tl_number' => $this->faker->bothify('1##'),
            'registration_number' => $this->faker->regexify('T[1-9]{3}[A-Z]{3}'),
            'trailer_make_id' => 1,
            'year_model' => $this->faker->year($max = 'now'),
            'chassis_number' => $this->faker->regexify('[A-Z]{4}[1-9]{8}'),
            'length' => 12.3,
            'width' => 2.4,
            'height' => 1.4,
            'maximum_weight' => 36,
            'maximum_pallet' => 20,
            'company_id' => $this->faker->numberBetween(1, 3),
            'trailer_type_id' => $this->faker->numberBetween(1, 3),
            'activity_status_id' => 1,
        ];
    }
}
