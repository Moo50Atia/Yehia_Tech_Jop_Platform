<?php

namespace Database\Factories;

use App\Models\JopApplication;
use App\Models\User;
use App\Models\JobVacansy;
use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JopApplication>
 */
class JopApplicationFactory extends Factory
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
        ];
    }
}
