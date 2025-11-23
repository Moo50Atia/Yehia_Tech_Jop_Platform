<?php

namespace Database\Factories;

use App\Models\JopCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JopCategory>
 */
class JopCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Software Development', 'Data Science', 'Design', 'Marketing',
                'Sales', 'Customer Service', 'Human Resources', 'Finance',
                'Engineering', 'Healthcare', 'Education', 'Legal',
                'Operations', 'Product Management', 'Quality Assurance', 'DevOps'
            ]),
        ];
    }
}
