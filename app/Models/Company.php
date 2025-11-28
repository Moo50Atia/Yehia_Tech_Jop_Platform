<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\JobVacansy;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory, HasUuids, SoftDeletes;
    protected $table = 'companies';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'name',
        'address',
        'industry',
        'website',
        'owner_id',

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
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
    public function jobVacancies()
    {
        return $this->hasMany(JobVacansy::class, 'company_id', 'id');
    }
}
