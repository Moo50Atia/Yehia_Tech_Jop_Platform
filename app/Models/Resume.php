<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Concerns\SoftDeletes;
use App\Models\JopApplication;
use App\Models\User;

class Resume extends Model
{
    /** @use HasFactory<\Database\Factories\ResumeFactory> */
    use HasFactory , HasUuids , SoftDeletes;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $incrementing = false;
    protected $table = 'resumes';
    protected $fillable = [
        'user_id',
        'filename',
        'fileURL',
        'contactDetails',
        'education',
        'summary',
        'skills',
        'experience',
    ];
    protected $dates = [
        "deleted_at"
    ];
    protected function casts(): array
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }
    public function user(){
        return $this->belongsTo(User::class ,'user_id','id');
    }    
    public function jobApplications(){
        return $this->hasMany(JopApplication::class ,'resume_id','id');
    }
}
