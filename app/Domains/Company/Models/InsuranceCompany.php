<?php

namespace App\Domains\Company\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceCompany extends Model
{
    use HasFactory,
        SoftDeletes;

    /**
     * The Insurances(products) that belong to this Insurance Company.
     */
    public function insurances()
    {
        return $this->belongsToMany(Insurance::class);
    }
}
