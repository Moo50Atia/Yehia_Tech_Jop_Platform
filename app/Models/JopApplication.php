<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Resume;
use App\Models\User;
use App\Models\JobVacansy;

class JopApplication extends Model
{
    /** @use HasFactory<\Database\Factories\JopApplicationFactory> */
    use HasFactory, HasUuids, SoftDeletes;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'jop_applications';
    protected $fillable = [
        'user_id',
        'job_vacansy_id',
        'resume_id',
        'status',
        'aiGeneratedScore',
        'aiGeneratedFeedback',
    ];

    protected function casts(): array
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function jobVacansy()
    {
        return $this->belongsTo(JobVacansy::class, 'job_vacansy_id', 'id');
    }
    public function resume()
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'id');
    }
}
