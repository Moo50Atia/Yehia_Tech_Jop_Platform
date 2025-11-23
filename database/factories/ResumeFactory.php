<?php

namespace Database\Factories;

use App\Models\Resume;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resume>
 */
class ResumeFactory extends Factory
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
            'filename' => fake()->firstName() . '_' . fake()->lastName() . '_Resume.pdf',
            'fileURL' => 'resumes/' . fake()->uuid() . '.pdf',
            'contactDetails' => json_encode([
                'phone' => fake()->phoneNumber(),
                'email' => fake()->email(),
                'linkedin' => fake()->url(),
            ]),
            'education' => fake()->paragraphs(2, true),
            'summary' => fake()->paragraph(4),
            'skills' => implode(', ', fake()->words(10)),
            'experience' => fake()->paragraphs(3, true),
        ];
    }
}
