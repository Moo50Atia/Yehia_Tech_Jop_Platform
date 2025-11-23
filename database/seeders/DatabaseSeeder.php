<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\JopCategory;
use App\Models\JobVacansy;
use App\Models\Resume;
use App\Models\JopApplication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456789'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create Job Categories
        $categories = [
            'Software Development',
            'Data Science',
            'Design',
            'Marketing',
            'Sales',
            'Customer Service',
            'Human Resources',
            'Finance',
            'Engineering',
            'Healthcare',
            'Education',
            'Legal'
        ];

        $jobCategories = [];
        foreach ($categories as $category) {
            $jobCategories[] = JopCategory::create(['name' => $category]);
        }

        // Create Company Owners (10)
        $companyOwners = User::factory(10)->create([
            'role' => 'company_owner',
        ]);

        // Create Job Seekers (30)
        $jobSeekers = User::factory(30)->create([
            'role' => 'jop_seeker',
        ]);

        // Create Companies (10) - one for each company owner
        $companies = [];
        foreach ($companyOwners as $owner) {
            $companies[] = Company::factory()->create([
                'owner_id' => $owner->id,
            ]);
        }

        // Create Job Vacancies (50) - distributed across companies and categories
        $jobVacancies = [];
        foreach ($companies as $company) {
            for ($i = 0; $i < 5; $i++) {
                $jobVacancies[] = JobVacansy::factory()->create([
                    'company_id' => $company->id,
                    'job_category_id' => fake()->randomElement($jobCategories)->id,
                ]);
            }
        }

        // Create Resumes for Job Seekers (30 resumes - one per job seeker)
        $resumes = [];
        foreach ($jobSeekers as $seeker) {
            $resumes[] = Resume::factory()->create([
                'user_id' => $seeker->id,
            ]);
        }

        // Create Job Applications (100) - job seekers applying to various jobs
        foreach ($jobSeekers as $seeker) {
            $seekerResume = $resumes[array_search($seeker->id, array_column($resumes, 'user_id'))];

            // Each job seeker applies to 3-5 random jobs
            $numberOfApplications = fake()->numberBetween(3, 5);
            $randomJobs = fake()->randomElements($jobVacancies, $numberOfApplications);

            foreach ($randomJobs as $job) {
                JopApplication::factory()->create([
                    'user_id' => $seeker->id,
                    'job_vacansy_id' => $job->id,
                    'resume_id' => $seekerResume->id,
                ]);
            }
        }

        $this->command->info('Database seeded successfully!');
        $this->command->info('Admin: admin@admin.com / 123456789');
        $this->command->info('Created: 10 Companies, 12 Categories, 50 Jobs, 30 Job Seekers, 30 Resumes, ~120 Applications');
    }
}
