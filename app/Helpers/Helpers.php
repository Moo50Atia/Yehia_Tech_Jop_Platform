<?php

use Illuminate\Support\Str;
use App\Models\JobApplication;

/**
 * دالة لاستخلاص الأحرف الأولى من الاسم الكامل (مثل Mohammed Atia -> MA).
 *
 * @param string $fullName الاسم الكامل.
 * @return string الأحرف الأولى.
 */
function getInitialsLaravel(string $fullName): string
{
    // 1. استخدام Str::of لبدء عملية متسلسلة على السلسلة النصية
    return Str::of($fullName)
        // 2. إزالة أي مسافات زائدة في البداية أو النهاية
        ->trim()
        // 3. تقسيم الاسم إلى مصفوفة بناءً على المسافات
        ->explode(' ')
        // 4. المرور على كل جزء من أجزاء الاسم (مثل Mohammed, Atia)
        ->map(function ($part) {
            // تجاهل أي أجزاء فارغة قد تنتج عن مسافات متعددة
            if (empty($part)) {
                return '';
            }
            // استخراج الحرف الأول من الجزء وتحويله إلى حرف كبير (Uppercase)
            return Str::upper(Str::substr($part, 0, 1));
        })
        // 5. دمج المصفوفة الناتجة مرة أخرى في سلسلة نصية واحدة (MA)
        ->implode('');
}

function Get_Applications_received_per_vacancy($company, $totalApplications)
{
    $result = [];

    foreach ($company->jobVacancies as $jobVacancy) {

        $applications = JobApplication::where("company_id", $company->id)
            ->where("job_vacansy_id", $jobVacancy->id)
            ->count();

        $percentage = $totalApplications > 0
            ? ($applications / $totalApplications) * 100
            : 0;

        $result[] = [
            "title" => $jobVacancy->title,
            "applications" => $applications,
            "percentage" => $percentage
        ];
    }

    return $result;
}
