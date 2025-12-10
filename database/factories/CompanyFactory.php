<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'address' => fake()->address(),
            'industry' => fake()->randomElement([
                'Technology',
                'Healthcare',
                'Finance',
                'Education',
                'Manufacturing',
                'Retail',
                'Construction',
                'Marketing',
                'Real Estate',
                'Hospitality',
                'Transportation',
                'Agriculture'
            ]),
            'website' => fake()->url(),
            'about' => fake()->sentence(10),
            'owner_id' => User::factory(),
        ];
    }
}
