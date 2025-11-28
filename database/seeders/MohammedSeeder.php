<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\JopCategory;
use App\Models\JobVacansy;
use App\Models\Resume;
use App\Models\JopApplication;
use Illuminate\Support\Facades\Hash;

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
        ]);

        $this->command->info('✓ Created User: admin@admin.com / 123456789 (Role: company_owner)');

        // ============================================
        // 2. Create Company for Admin
        // ============================================
        $adminCompany = Company::create([
            'name' => 'Yehia Tech Solutions',
            'address' => 'Cairo, Egypt',
            'industry' => 'Technology & Software',
            'website' => 'https://yehiatech.com',
            'owner_id' => $admin->id,
        ]);

        $this->command->info('✓ Created Company: ' . $adminCompany->name);

        // ============================================
        // 3. Create Job Categories
        // ============================================
        $categories = [
            'Software Development',
            'Data Science',
            'UI/UX Design',
            'Digital Marketing',
            'Project Management',
        ];

        $jobCategories = [];
        foreach ($categories as $category) {
            $jobCategories[] = JopCategory::create(['name' => $category]);
        }

        $this->command->info('✓ Created ' . count($jobCategories) . ' Job Categories');

        // ============================================
        // 4. Create Job Vacancies for Admin's Company
        // ============================================
        $jobVacancies = [];

        $jobVacancies[] = JobVacansy::create([
            'title' => 'Senior Laravel Developer',
            'description' => 'نبحث عن مطور Laravel محترف للانضمام لفريقنا. المتطلبات: خبرة 5+ سنوات في Laravel, Vue.js, MySQL',
            'location' => 'Cairo, Egypt (Hybrid)',
            'type' => 'full-time',
            'salary' => 15000,
            'company_id' => $adminCompany->id,
            'job_category_id' => $jobCategories[0]->id,
        ]);

        $jobVacancies[] = JobVacansy::create([
            'title' => 'Frontend Developer (React)',
            'description' => 'مطلوب مطور واجهات أمامية متمكن من React و TypeScript. المتطلبات: 3+ سنوات خبرة',
            'location' => 'Remote',
            'type' => 'full-time',
            'salary' => 12000,
            'company_id' => $adminCompany->id,
            'job_category_id' => $jobCategories[0]->id,
        ]);

        $jobVacancies[] = JobVacansy::create([
            'title' => 'UI/UX Designer',
            'description' => 'مصمم واجهات مستخدم مبدع. المتطلبات: Figma, Adobe XD, خبرة 2+ سنوات',
            'location' => 'Cairo, Egypt',
            'type' => 'full-time',
            'salary' => 10000,
            'company_id' => $adminCompany->id,
            'job_category_id' => $jobCategories[2]->id,
        ]);

        $jobVacancies[] = JobVacansy::create([
            'title' => 'Data Analyst',
            'description' => 'محلل بيانات للعمل على مشاريع تحليل البيانات. المتطلبات: Python, SQL, Power BI',
            'location' => 'Hybrid',
            'type' => 'contract',
            'salary' => 8000,
            'company_id' => $adminCompany->id,
            'job_category_id' => $jobCategories[1]->id,
        ]);

        $jobVacancies[] = JobVacansy::create([
            'title' => 'Digital Marketing Specialist',
            'description' => 'أخصائي تسويق رقمي. المتطلبات: SEO, SEM, Social Media Marketing',
            'location' => 'Remote',
            'type' => 'part-time',
            'salary' => 6000,
            'company_id' => $adminCompany->id,
            'job_category_id' => $jobCategories[3]->id,
        ]);

        $this->command->info('✓ Created ' . count($jobVacancies) . ' Job Vacancies');

        // ============================================
        // 5. Create Job Seekers with Resumes
        // ============================================
        $jobSeekers = [];
        $resumes = [];

        // Job Seeker 1: Ahmed Mohamed
        $seeker1 = User::create([
            'name' => 'Ahmed Mohamed',
            'email' => 'ahmed.mohamed@email.com',
            'password' => Hash::make('123456789'),
            'role' => 'jop_seeker',
            'email_verified_at' => now(),
        ]);
        $jobSeekers[] = $seeker1;

        $resumes[] = Resume::create([
            'user_id' => $seeker1->id,
            'filename' => 'ahmed_mohamed_cv.pdf',
            'fileURL' => 'https://example.com/resumes/ahmed_mohamed.pdf',
            'contactDetails' => 'Phone: +201234567890, Email: ahmed.mohamed@email.com',
            'education' => 'بكالوريوس علوم الحاسب - جامعة القاهرة (2018)',
            'summary' => 'مطور Laravel محترف مع خبرة 6 سنوات في تطوير تطبيقات الويب',
            'skills' => 'Laravel, PHP, Vue.js, MySQL, Redis, Docker, Git, RESTful APIs',
            'experience' => "Senior Laravel Developer - Tech Company (2020-2024)\n- تطوير وصيانة أكثر من 10 مشاريع\n- قيادة فريق من 3 مطورين\n\nLaravel Developer - Startup (2018-2020)\n- تطوير APIs و Backend Systems",
        ]);

        // Job Seeker 2: Fatma Ali
        $seeker2 = User::create([
            'name' => 'Fatma Ali',
            'email' => 'fatma.ali@email.com',
            'password' => Hash::make('123456789'),
            'role' => 'jop_seeker',
            'email_verified_at' => now(),
        ]);
        $jobSeekers[] = $seeker2;

        $resumes[] = Resume::create([
            'user_id' => $seeker2->id,
            'filename' => 'fatma_ali_cv.pdf',
            'fileURL' => 'https://example.com/resumes/fatma_ali.pdf',
            'contactDetails' => 'Phone: +201234567891, Email: fatma.ali@email.com',
            'education' => 'بكالوريوس هندسة حاسبات - جامعة عين شمس (2019)',
            'summary' => 'مطورة Frontend متخصصة في React و TypeScript',
            'skills' => 'React, TypeScript, JavaScript, HTML5, CSS3, Tailwind CSS, Next.js, Redux',
            'experience' => "Frontend Developer - Digital Agency (2019-2024)\n- تطوير واجهات مستخدم تفاعلية\n- تحسين أداء التطبيقات بنسبة 40%",
        ]);

        // Job Seeker 3: Omar Hassan
        $seeker3 = User::create([
            'name' => 'Omar Hassan',
            'email' => 'omar.hassan@email.com',
            'password' => Hash::make('123456789'),
            'role' => 'jop_seeker',
            'email_verified_at' => now(),
        ]);
        $jobSeekers[] = $seeker3;

        $resumes[] = Resume::create([
            'user_id' => $seeker3->id,
            'filename' => 'omar_hassan_cv.pdf',
            'fileURL' => 'https://example.com/resumes/omar_hassan.pdf',
            'contactDetails' => 'Phone: +201234567892, Email: omar.hassan@email.com',
            'education' => 'بكالوريوس فنون جميلة - جامعة حلوان (2020)',
            'summary' => 'مصمم UI/UX مبدع مع شغف بتصميم تجارب مستخدم استثنائية',
            'skills' => 'Figma, Adobe XD, Sketch, Photoshop, Illustrator, User Research, Prototyping',
            'experience' => "UI/UX Designer - Design Studio (2020-2024)\n- تصميم أكثر من 30 واجهة ويب وموبايل\n- إجراء أبحاث المستخدمين واختبارات القابلية للاستخدام",
        ]);

        // Job Seeker 4: Nour Ibrahim
        $seeker4 = User::create([
            'name' => 'Nour Ibrahim',
            'email' => 'nour.ibrahim@email.com',
            'password' => Hash::make('123456789'),
            'role' => 'jop_seeker',
            'email_verified_at' => now(),
        ]);
        $jobSeekers[] = $seeker4;

        $resumes[] = Resume::create([
            'user_id' => $seeker4->id,
            'filename' => 'nour_ibrahim_cv.pdf',
            'fileURL' => 'https://example.com/resumes/nour_ibrahim.pdf',
            'contactDetails' => 'Phone: +201234567893, Email: nour.ibrahim@email.com',
            'education' => 'بكالوريوس إحصاء - جامعة القاهرة (2019)',
            'summary' => 'محللة بيانات متخصصة في تحليل البيانات والتصور البياني',
            'skills' => 'Python, SQL, Power BI, Tableau, Excel, Data Analysis, Statistics',
            'experience' => "Data Analyst - Analytics Company (2019-2024)\n- تحليل البيانات وإنشاء التقارير\n- بناء لوحات معلومات تفاعلية",
        ]);

        // Job Seeker 5: Youssef Khaled
        $seeker5 = User::create([
            'name' => 'Youssef Khaled',
            'email' => 'youssef.khaled@email.com',
            'password' => Hash::make('123456789'),
            'role' => 'jop_seeker',
            'email_verified_at' => now(),
        ]);
        $jobSeekers[] = $seeker5;

        $resumes[] = Resume::create([
            'user_id' => $seeker5->id,
            'filename' => 'youssef_khaled_cv.pdf',
            'fileURL' => 'https://example.com/resumes/youssef_khaled.pdf',
            'contactDetails' => 'Phone: +201234567894, Email: youssef.khaled@email.com',
            'education' => 'بكالوريوس تجارة - جامعة الإسكندرية (2018)',
            'summary' => 'أخصائي تسويق رقمي مع خبرة في SEO و Social Media',
            'skills' => 'SEO, SEM, Google Analytics, Facebook Ads, Content Marketing, Social Media',
            'experience' => "Digital Marketing Specialist - Marketing Agency (2018-2024)\n- إدارة حملات إعلانية بميزانية 100,000 جنيه\n- زيادة التفاعل بنسبة 200%",
        ]);

        // Job Seeker 6: Mona Samir
        $seeker6 = User::create([
            'name' => 'Mona Samir',
            'email' => 'mona.samir@email.com',
            'password' => Hash::make('123456789'),
            'role' => 'jop_seeker',
            'email_verified_at' => now(),
        ]);
        $jobSeekers[] = $seeker6;

        $resumes[] = Resume::create([
            'user_id' => $seeker6->id,
            'filename' => 'mona_samir_cv.pdf',
            'fileURL' => 'https://example.com/resumes/mona_samir.pdf',
            'contactDetails' => 'Phone: +201234567895, Email: mona.samir@email.com',
            'education' => 'بكالوريوس علوم الحاسب - الجامعة الأمريكية (2021)',
            'summary' => 'مطورة Full Stack مبتدئة مع شغف بالتعلم',
            'skills' => 'HTML, CSS, JavaScript, PHP, Laravel, MySQL, Git',
            'experience' => "Junior Developer - Small Company (2021-2024)\n- المساعدة في تطوير المشاريع\n- تعلم أفضل الممارسات",
        ]);

        $this->command->info('✓ Created ' . count($jobSeekers) . ' Job Seekers with Resumes');

        // ============================================
        // 6. Create Job Applications
        // ============================================
        $applications = [];

        // Ahmed applies to Laravel Developer position
        $applications[] = JopApplication::create([
            'user_id' => $seeker1->id,
            'job_vacansy_id' => $jobVacancies[0]->id, // Senior Laravel Developer
            'resume_id' => $resumes[0]->id,
            'company_id' => $adminCompany->id,
            'status' => 'pending',
            'aiGeneratedScore' => 95.5,
            'aiGeneratedFeedback' => 'مرشح ممتاز مع خبرة قوية في Laravel. المهارات تتطابق تماماً مع متطلبات الوظيفة.',
        ]);

        $applications[] = JopApplication::create([
            'user_id' => $seeker1->id,
            'job_vacansy_id' => $jobVacancies[1]->id, // Frontend Developer
            'resume_id' => $resumes[0]->id,
            'company_id' => $adminCompany->id,
            'status' => 'accepted',
            'aiGeneratedScore' => 78.0,
            'aiGeneratedFeedback' => 'خبرة جيدة ولكن التركيز الأساسي على Backend.',
        ]);

        // Fatma applies to Frontend position
        $applications[] = JopApplication::create([
            'user_id' => $seeker2->id,
            'job_vacansy_id' => $jobVacancies[1]->id, // Frontend Developer
            'resume_id' => $resumes[1]->id,
            'company_id' => $adminCompany->id,
            'status' => 'pending',
            'aiGeneratedScore' => 92.0,
            'aiGeneratedFeedback' => 'مرشحة ممتازة مع خبرة قوية في React و TypeScript.',
        ]);

        // Omar applies to UI/UX Designer
        $applications[] = JopApplication::create([
            'user_id' => $seeker3->id,
            'job_vacansy_id' => $jobVacancies[2]->id, // UI/UX Designer
            'resume_id' => $resumes[2]->id,
            'company_id' => $adminCompany->id,
            'status' => 'accepted',
            'aiGeneratedScore' => 90.0,
            'aiGeneratedFeedback' => 'مصمم موهوب مع portfolio قوي.',
        ]);

        // Nour applies to Data Analyst
        $applications[] = JopApplication::create([
            'user_id' => $seeker4->id,
            'job_vacansy_id' => $jobVacancies[3]->id, // Data Analyst
            'resume_id' => $resumes[3]->id,
            'company_id' => $adminCompany->id,
            'status' => 'pending',
            'aiGeneratedScore' => 88.5,
            'aiGeneratedFeedback' => 'خبرة جيدة في تحليل البيانات والأدوات المطلوبة.',
        ]);

        // Youssef applies to Digital Marketing
        $applications[] = JopApplication::create([
            'user_id' => $seeker5->id,
            'job_vacansy_id' => $jobVacancies[4]->id, // Digital Marketing
            'resume_id' => $resumes[4]->id,
            'company_id' => $adminCompany->id,
            'status' => 'rejected',
            'aiGeneratedScore' => 72.0,
            'aiGeneratedFeedback' => 'خبرة جيدة ولكن نبحث عن تخصص أكثر في SEO.',
        ]);

        // Mona applies to Laravel Developer (overqualified rejection example)
        $applications[] = JopApplication::create([
            'user_id' => $seeker6->id,
            'job_vacansy_id' => $jobVacancies[0]->id, // Senior Laravel Developer
            'resume_id' => $resumes[5]->id,
            'company_id' => $adminCompany->id,
            'status' => 'pending',
            'aiGeneratedScore' => 65.0,
            'aiGeneratedFeedback' => 'مرشحة واعدة ولكن تحتاج المزيد من الخبرة للمنصب Senior.',
        ]);

        // Mona also applies to Frontend
        $applications[] = JopApplication::create([
            'user_id' => $seeker6->id,
            'job_vacansy_id' => $jobVacancies[1]->id, // Frontend Developer
            'resume_id' => $resumes[5]->id,
            'company_id' => $adminCompany->id,
            'status' => 'pending',
            'aiGeneratedScore' => 70.0,
            'aiGeneratedFeedback' => 'مهارات أساسية جيدة، مناسبة للمنصب.',
        ]);

        $this->command->info('✓ Created ' . count($applications) . ' Job Applications');

        // ============================================
        // Summary
        // ============================================
        $this->command->newLine();
        $this->command->info('========================================');
        $this->command->info('تم إنشاء البيانات بنجاح!');
        $this->command->info('========================================');
        $this->command->newLine();

        $this->command->info('👤 المستخدم الرئيسي:');
        $this->command->info('   Email: admin@admin.com');
        $this->command->info('   Password: 123456789');
        $this->command->info('   Role: company_owner (يمكن تغييره لـ admin في الداتابيز)');
        $this->command->info('   Company: ' . $adminCompany->name);
        $this->command->newLine();

        $this->command->info('📊 البيانات المنشأة:');
        $this->command->info('   - 1 شركة (Yehia Tech Solutions)');
        $this->command->info('   - ' . count($jobCategories) . ' فئات وظائف');
        $this->command->info('   - ' . count($jobVacancies) . ' وظائف شاغرة');
        $this->command->info('   - ' . count($jobSeekers) . ' باحثين عن عمل');
        $this->command->info('   - ' . count($resumes) . ' سيرة ذاتية');
        $this->command->info('   - ' . count($applications) . ' طلبات توظيف');
        $this->command->newLine();

        $this->command->info('🧪 للاختبار:');
        $this->command->info('   1. سجل دخول بـ admin@admin.com / 123456789');
        $this->command->info('   2. Role حالياً: company_owner - ستشاهد المتقدمين فقط');
        $this->command->info('   3. لاختبار Admin: غير الـ role في الداتابيز لـ "admin"');
        $this->command->info('   4. زر /users لرؤية المتقدمين على وظائف شركتك');
        $this->command->newLine();
    }
}
