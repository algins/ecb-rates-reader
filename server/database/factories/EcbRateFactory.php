<?php

namespace Database\Factories;

use App\Models\EcbRate;
use Illuminate\Database\Eloquent\Factories\Factory;

class EcbRateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EcbRate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'currency' => $this->faker->currencyCode,
            'rate' => $this->faker->randomFloat(8, 0, 1000),
            'date' => date('Y-m-d'),
        ];
    }

    /**
     * Indicate that ECB rate is historical.
     *
     * @return Factory
     */
    public function historical()
    {
        return $this->state(function (array $attributes) {
            return ['date' => date('Y-m-d', time() - 60 * 60 * 24)]; // yesterdays date
        });
    }
}
