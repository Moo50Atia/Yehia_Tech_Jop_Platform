<?php

namespace Database\Factories;

use App\Models\JobApplication;
use App\Models\User;
use App\Models\JobVacansy;
use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobApplication>
 */
class JobApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'job_vacansy_id' => JobVacansy::factory(),
            'resume_id' => Resume::factory(),
            'status' => fake()->randomElement(['pending', 'accepted', 'rejected']),
            'aiGeneratedScore' => fake()->randomFloat(2, 0, 100),
            'aiGeneratedFeedback' => fake()->paragraph(3),
            'company_id' => Company::factory(),
        ];
    }
}
