<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\JopCategory;
use App\Models\Company;
use App\Models\JopApplication;

class JobVacansy extends Model
{
    /** @use HasFactory<\Database\Factories\JobVacansyFactory> */
    use HasFactory, HasUuids, SoftDeletes;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'job_vacansies';

    protected $fillable = [
        'company_id',
        'job_category_id',
        'note',
        'title',
        'description',
        'location',
        'type',
        'salary',

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
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    public function jobCategory()
    {
        return $this->belongsTo(JopCategory::class, 'job_category_id', 'id');
    }
    public function JopApplications()
    {
        return $this->hasMany(JopApplication::class, 'job_vacansy_id', 'id');
    }
}
