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
     * The Companies that have this type of Insurance.
     */
    public function companies()
    {
        return $this->belongsToMany(InsuranceCompany::class);
    }
}
