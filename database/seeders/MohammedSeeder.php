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


class MohammedSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ============================================
        // 1. Create Main User (Admin) as Company Owner
        // ============================================
        $admin = User::create([
            'name' => 'Mohammed Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456789'),
            'role' => 'company_owner', // يمكن تغييره لـ admin للاختبار
            'email_verified_at' => now(),
            'created_at' => now()->subMonths(6),
            'updated_at' => now()->subMonths(6),
        ]);

        $this->command->info('✓ Created User: admin@admin.com / 123456789 (Role: company_owner)');

        // ============================================
        // 2. Create Company for Admin
        // ============================================
        $adminCompany = Company::factory()->create([
            'name' => 'Mohammed Atia',
            'owner_id' => $admin->id,
            'created_at' => now()->subMonths(6),
            'updated_at' => now()->subMonths(6),
        ]);

        $this->command->info('✓ Created Company: ' . $adminCompany->name);

        // ============================================
        // 3. Create Job Categories (with unique names)
        // ============================================
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
            'Legal',
            'Operations',
            'Product Management',
            'Quality Assurance',
            'DevOps',
        ];

        $jobCategories = collect();
        foreach ($categoryNames as $name) {
            $category = JopCategory::firstOrCreate(
                ['name' => $name],
                ['created_at' => now()->subMonths(6), 'updated_at' => now()->subMonths(6)]
            );
            $jobCategories->push($category);
        }

        $this->command->info('✓ Created/Found ' . $jobCategories->count() . ' Job Categories');

        // ============================================
        // 4. Create Job Vacancies (spread over 6 months)
        // ============================================
        $jobVacancies = collect();

        for ($i = 0; $i < 20; $i++) {
            $monthsAgo = rand(0, 5);
            $createdAt = now()->subMonths($monthsAgo)->subDays(rand(0, 25));

            $vacancy = JobVacansy::factory()->create([
                'company_id' => $adminCompany->id,
                'job_category_id' => $jobCategories->random()->id,
                'status' => fake()->randomElement(['active', 'active', 'pending', 'rejected']),
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);
            $jobVacancies->push($vacancy);
        }

        $this->command->info('✓ Created ' . $jobVacancies->count() . ' Job Vacancies (spread over 6 months)');

        // ============================================
        // 5. Create Job Seekers with Resumes (spread over 6 months)
        // ============================================
        $jobSeekers = collect();
        $resumes = [];

        for ($month = 5; $month >= 0; $month--) {
            $seekersThisMonth = rand(7, 10);
            $createdAt = now()->subMonths($month)->subDays(rand(0, 25));

            $monthSeekers = User::factory($seekersThisMonth)->create([
                'role' => 'jop_seeker',
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);

            foreach ($monthSeekers as $seeker) {
                $resumes[] = Resume::factory()->create([
                    'user_id' => $seeker->id,
                    'created_at' => $createdAt->copy()->addDays(rand(1, 5)),
                    'updated_at' => $createdAt->copy()->addDays(rand(1, 5)),
                ]);
            }
            $jobSeekers = $jobSeekers->merge($monthSeekers);
        }

        $this->command->info('✓ Created ' . $jobSeekers->count() . ' Job Seekers with Resumes (spread over 6 months)');

        // ============================================
        // 6. Create Job Applications (spread over 6 months)
        // ============================================
        $applications = [];

        // Create 100 random applications spread over time
        for ($i = 0; $i < 100; $i++) {
            $randomSeeker = $jobSeekers->random();
            $randomVacancy = $jobVacancies->random();
            $seekerResume = collect($resumes)->firstWhere('user_id', $randomSeeker->id);

            if ($seekerResume) {
                // Application created after vacancy creation
                $vacancyDate = Carbon::parse($randomVacancy->created_at);
                $appCreatedAt = $vacancyDate->copy()->addDays(rand(1, 45));
                if ($appCreatedAt->isFuture()) {
                    $appCreatedAt = now()->subDays(rand(1, 10));
                }

                $applications[] = JobApplication::factory()->create([
                    'user_id' => $randomSeeker->id,
                    'job_vacansy_id' => $randomVacancy->id,
                    'resume_id' => $seekerResume->id,
                    'company_id' => $adminCompany->id,
                    'status' => fake()->randomElement(['pending', 'pending', 'accepted', 'rejected']),
                    'created_at' => $appCreatedAt,
                    'updated_at' => $appCreatedAt,
                ]);
            }
        }

        $this->command->info('✓ Created ' . count($applications) . ' Job Applications (spread over 6 months)');

        // ============================================
        // Summary
        // ============================================
        $this->command->newLine();
        $this->command->info('========================================');
        $this->command->info('تم إنشاء البيانات بنجاح!');
        $this->command->info('Data spread over 6 months for growth charts');
        $this->command->info('========================================');
        $this->command->newLine();

        $this->command->info('👤 المستخدم الرئيسي:');
        $this->command->info('   Email: admin@admin.com');
        $this->command->info('   Password: 123456789');
        $this->command->info('   Role: company_owner');
        $this->command->info('   Company: ' . $adminCompany->name);
        $this->command->newLine();

        $this->command->info('📊 البيانات المنشأة:');
        $this->command->info('   - 1 شركة');
        $this->command->info('   - ' . $jobCategories->count() . ' فئات وظائف');
        $this->command->info('   - ' . $jobVacancies->count() . ' وظائف شاغرة');
        $this->command->info('   - ' . $jobSeekers->count() . ' باحثين عن عمل');
        $this->command->info('   - ' . count($resumes) . ' سيرة ذاتية');
        $this->command->info('   - ' . count($applications) . ' طلبات توظيف');
        $this->command->newLine();
    }
}
