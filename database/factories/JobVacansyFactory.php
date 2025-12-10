<?php

namespace Database\Factories;

use App\Models\JobVacansy;
use App\Models\Company;
use App\Models\JopCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobVacansy>
 */
class JobVacansyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraphs(3, true),
            'location' => fake()->city() . ', ' . fake()->country(),
            'type' => fake()->randomElement(['full-time', 'remote', 'contract', 'part-time']),
            'salary' => fake()->randomFloat(2, 30000, 150000),
            'company_id' => Company::factory(),
            'job_category_id' => null,
            'note' => fake()->sentence(),
            'status' => fake()->randomElement(['active', 'pending', 'rejected']),
        ];
    }
}
