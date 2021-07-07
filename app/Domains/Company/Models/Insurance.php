<?php

namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insurance extends Model
{
    use HasFactory,
        SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    /**
     * The Companies that have this type of Insurance.
     */
    public function companies()
    {
        return $this->belongsToMany(InsuranceCompany::class, 'company_insurance', 'insurance_id', 'company_id');
    }
}
