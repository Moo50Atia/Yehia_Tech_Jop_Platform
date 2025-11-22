<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Concerns\SoftDeletes;
use App\Models\JobVacansy;
class JopCategory extends Model
{
    /** @use HasFactory<\Database\Factories\JopCategoryFactory> */
    use HasFactory , HasUuids , SoftDeletes;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $incrementing = false;
    protected $table = 'jop_categories';
    protected $fillable = [
        'name',
    ];
   protected function casts(): array
    {
        return [
           'deleted_at' => 'datetime',
        ];
    }
    public function jobVacansies(){
        return $this->hasMany(JobVacansy::class ,'job_category_id','id');
    }
}
