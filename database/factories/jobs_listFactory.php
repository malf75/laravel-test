<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use APP\Models\Jobs_list;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class jobs_listFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Jobs_list::class;

    public function definition(): array
    {
        return [
            "titulo" => $this->faker->jobTitle(),
            "salario" => $this->faker->randomNumber(4),
        ];
    }
}
