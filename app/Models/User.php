<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\JobApplication;
use App\Models\Resume;
use App\Models\Company;
use App\Models\JobVacansy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\DashboardTrait;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUuids, SoftDeletes, DashboardTrait;

    /**
     * The attributes that are mass assignable.
     *  
     * @var list<string>
     */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'deleted_at' => 'datetime',
        ];
    }
    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'user_id', 'id');
    }
    public function resumes()
    {
        return $this->hasMany(Resume::class, 'user_id', 'id');
    }
    public function company()
    {
        return $this->hasOne(Company::class, 'owner_id', 'id');
    }

    // Accessor For the relation of companies and the user in the company if the user is company owner
    protected function companyJobApplicationsUsers(): Attribute
    {
        return Attribute::make(
            get: function () {

                if (!$this->company) {
                    return User::whereRaw("1 = 0");
                }

                return User::whereHas("jobApplications", function ($q) {
                    $q->where("company_id", $this->company->id);
                });
            }
        );
    }
    public function getInitialsAttribute(): string
    {
        // استدعاء دالة الـ Helper مباشرةً لأنها معرفة عالمياً
        return getInitialsLaravel($this->name);
    }
    public function getAverageScoreAttribute()
    {
        // نفترض ان عندك company_id معروف من الـ context أو علاقة
        $companyId = Auth::user()->company->id;

        return round($this->jobApplications()
            ->where('company_id', $companyId)
            ->avg('aiGeneratedScore'), 1);
    }
    public function getLastApplicationVacancyAttribute()
    {
        $lastApplication = $this->jobApplications()
            ->where('company_id', Auth::user()->company->id)
            ->latest()
            ->first(); // رجع الـ Application كاملة بدل value('created_at')

        return $lastApplication?->jobVacansy; // ترجع الـ vacancy المرتبط بيها
    }

    public function getLastApplicationDateAttribute()
    {
        $lastApplication = $this->jobApplications()
            ->where('company_id', Auth::user()->company->id)
            ->latest()
            ->first();

        return $lastApplication?->created_at?->format('M d, Y');
    }
}
