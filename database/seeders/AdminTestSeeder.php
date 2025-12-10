<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\JopCategory;
use App\Models\JobVacansy;
use App\Models\Resume;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminTestSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     * Creates multiple company owners with companies, vacancies, and applications
     * spread over 6 months for testing Admin panel functionality.
     */
    public function run(): void
    {
        // ============================================
        // 1. Create Admin User
        // ============================================
        $admin = User::create([
            'name' => 'System Admin',
            'email' => 'superadmin@admin.com',
            'password' => Hash::make('123456789'),
            'role' => 'admin',
            'email_verified_at' => now(),
            'created_at' => now()->subMonths(6),
            'updated_at' => now()->subMonths(6),
        ]);

        $this->command->info('✓ Created Admin User: superadmin@admin.com / 123456789');

        // ============================================
        // 2. Get existing categories (created by MohammedSeeder)
        // ============================================
        $allCategories = JopCategory::all();

        if ($allCategories->isEmpty()) {
            // Create categories if none exist (fallback)
            $categoryNames = [
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

            foreach ($categoryNames as $name) {
                JopCategory::firstOrCreate(['name' => $name]);
            }
            $allCategories = JopCategory::all();
            $this->command->info('✓ Created ' . $allCategories->count() . ' Job Categories');
        } else {
            $this->command->info('✓ Using existing ' . $allCategories->count() . ' Job Categories');
        }

        // ============================================
        // 3. Create Job Seekers (spread over 6 months)
        // ============================================
        $allJobSeekers = collect();
        $allResumes = collect();

        for ($month = 5; $month >= 0; $month--) {
            $seekersThisMonth = rand(4, 6);
            $createdAt = now()->subMonths($month)->subDays(rand(0, 25));

            $seekers = User::factory($seekersThisMonth)->create([
                'role' => 'jop_seeker',
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);

            foreach ($seekers as $seeker) {
                $allResumes->push(Resume::factory()->create([
                    'user_id' => $seeker->id,
                    'created_at' => $createdAt->copy()->addDays(rand(1, 5)),
                    'updated_at' => $createdAt->copy()->addDays(rand(1, 5)),
                ]));
            }
            $allJobSeekers = $allJobSeekers->merge($seekers);
        }

        $this->command->info('✓ Created ' . $allJobSeekers->count() . ' Job Seekers with Resumes (spread over 6 months)');

        // ============================================
        // 4. Create Multiple Company Owners with Full Data
        // ============================================
        $companyData = [
            [
                'owner_name' => 'Ahmed Hassan',
                'owner_email' => 'ahmed.company@test.com',
                'company_name' => 'Tech Solutions Egypt',
                'industry' => 'Technology',
                'months_ago' => 5, // Created 5 months ago
                'vacancies' => 8,
                'applications_per_vacancy' => 5,
            ],
            [
                'owner_name' => 'Sara Mohamed',
                'owner_email' => 'sara.company@test.com',
                'company_name' => 'Digital Marketing Pro',
                'industry' => 'Marketing',
                'months_ago' => 4,
                'vacancies' => 6,
                'applications_per_vacancy' => 4,
            ],
            [
                'owner_name' => 'Khaled Ibrahim',
                'owner_email' => 'khaled.company@test.com',
                'company_name' => 'Finance Hub',
                'industry' => 'Finance',
                'months_ago' => 3,
                'vacancies' => 5,
                'applications_per_vacancy' => 6,
            ],
            [
                'owner_name' => 'Nora Ahmed',
                'owner_email' => 'nora.company@test.com',
                'company_name' => 'Healthcare Plus',
                'industry' => 'Healthcare',
                'months_ago' => 2,
                'vacancies' => 7,
                'applications_per_vacancy' => 3,
            ],
            [
                'owner_name' => 'Omar Youssef',
                'owner_email' => 'omar.company@test.com',
                'company_name' => 'E-Commerce Masters',
                'industry' => 'E-Commerce',
                'months_ago' => 1,
                'vacancies' => 10,
                'applications_per_vacancy' => 8,
            ],
        ];

        $totalVacancies = 0;
        $totalApplications = 0;

        foreach ($companyData as $data) {
            $companyCreatedAt = now()->subMonths($data['months_ago'])->subDays(rand(0, 15));

            // Create Company Owner
            $owner = User::create([
                'name' => $data['owner_name'],
                'email' => $data['owner_email'],
                'password' => Hash::make('123456789'),
                'role' => 'company_owner',
                'email_verified_at' => now(),
                'created_at' => $companyCreatedAt,
                'updated_at' => $companyCreatedAt,
            ]);

            // Create Company using Factory
            $company = Company::factory()->create([
                'name' => $data['company_name'],
                'industry' => $data['industry'],
                'owner_id' => $owner->id,
                'created_at' => $companyCreatedAt,
                'updated_at' => $companyCreatedAt,
            ]);

            // Create Vacancies spread over months since company creation
            $vacanciesCollection = collect();
            for ($i = 0; $i < $data['vacancies']; $i++) {
                $vacancyMonthsAgo = rand(0, $data['months_ago']);
                $vacancyCreatedAt = now()->subMonths($vacancyMonthsAgo)->subDays(rand(0, 25));

                $vacancy = JobVacansy::factory()->create([
                    'company_id' => $company->id,
                    'job_category_id' => $allCategories->random()->id,
                    'status' => fake()->randomElement(['active', 'active', 'pending', 'rejected']),
                    'created_at' => $vacancyCreatedAt,
                    'updated_at' => $vacancyCreatedAt,
                ]);
                $vacanciesCollection->push($vacancy);
            }

            $totalVacancies += $vacanciesCollection->count();

            // Create Applications for each Vacancy (after vacancy creation date)
            foreach ($vacanciesCollection as $vacancy) {
                $applicantCount = min($data['applications_per_vacancy'], $allJobSeekers->count());
                $randomSeekers = $allJobSeekers->random($applicantCount);

                foreach ($randomSeekers as $seeker) {
                    $resume = $allResumes->firstWhere('user_id', $seeker->id);
                    if ($resume) {
                        // Application created after vacancy, but before now
                        $appCreatedAt = Carbon::parse($vacancy->created_at)->addDays(rand(1, 30));
                        if ($appCreatedAt->isFuture()) {
                            $appCreatedAt = now()->subDays(rand(1, 10));
                        }

                        JobApplication::factory()->create([
                            'user_id' => $seeker->id,
                            'job_vacansy_id' => $vacancy->id,
                            'resume_id' => $resume->id,
                            'company_id' => $company->id,
                            'status' => fake()->randomElement(['pending', 'pending', 'accepted', 'rejected']),
                            'aiGeneratedScore' => fake()->numberBetween(40, 98),
                            'created_at' => $appCreatedAt,
                            'updated_at' => $appCreatedAt,
                        ]);
                        $totalApplications++;
                    }
                }
            }

            $this->command->info("✓ Created Company: {$data['company_name']} ({$data['months_ago']} months ago)");
        }

        // ============================================
        // Summary
        // ============================================
        $this->command->newLine();
        $this->command->info('========================================');
        $this->command->info('Admin Test Data Created Successfully!');
        $this->command->info('Data spread over 6 months for growth charts');
        $this->command->info('========================================');
        $this->command->newLine();

        $this->command->info('👤 Admin: superadmin@admin.com / 123456789');
        $this->command->newLine();

        $this->command->info('🏢 Company Owners (password: 123456789):');
        foreach ($companyData as $data) {
            $this->command->info("   - {$data['owner_email']} => {$data['company_name']}");
        }
        $this->command->newLine();

        $this->command->info('📊 Summary: ' . count($companyData) . ' companies, ' . $totalVacancies . ' vacancies, ' . $totalApplications . ' applications');
        $this->command->newLine();
    }
}
