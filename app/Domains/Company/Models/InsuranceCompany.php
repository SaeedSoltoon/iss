<?php

namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\InsuranceCompanyFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class InsuranceCompany extends Model
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
        'description',
        'website',
        'logo',
        'bio',
        'created_by',
    ];

    /**
     * The Insurances(products) that belong to this Insurance Company.
     */
    public function insurances()
    {
        return $this->belongsToMany(Insurance::class, 'company_insurance', 'company_id', 'insurance_id');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return InsuranceCompanyFactory::new();
    }
}
