<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ============================================
        // MohammedSeeder: Your personal test data
        // Creates: 1 company_owner (admin@admin.com), 1 company, 20 vacancies, 50 job seekers, 100 applications
        // ============================================
        $this->call([
            MohammedSeeder::class,
        ]);

        // ============================================
        // AdminTestSeeder: Multiple companies for Admin testing
        // Creates: 1 admin, 5 company owners, 5 companies, ~36 vacancies, 30 job seekers, ~200 applications
        // ============================================
        $this->call([
            AdminTestSeeder::class,
        ]);

        $this->command->newLine();
        $this->command->info('========================================');
        $this->command->info('All Seeders Completed!');
        $this->command->info('========================================');
        $this->command->newLine();

        $this->command->info('📌 Quick Login Reference:');
        $this->command->info('');
        $this->command->info('Company Owner (Your Test Account):');
        $this->command->info('   admin@admin.com / 123456789');
        $this->command->info('');
        $this->command->info('Admin:');
        $this->command->info('   superadmin@admin.com / 123456789');
        $this->command->info('');
        $this->command->info('Other Company Owners:');
        $this->command->info('   ahmed.company@test.com / 123456789');
        $this->command->info('   sara.company@test.com / 123456789');
        $this->command->info('   khaled.company@test.com / 123456789');
        $this->command->info('   nora.company@test.com / 123456789');
        $this->command->info('   omar.company@test.com / 123456789');
        $this->command->newLine();
    }
}
