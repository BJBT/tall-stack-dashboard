<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = ['is_active' => 'boolean'];

    public function questions()
    {
        return $this->hasMany(SurveyQuestion::class);
    }

    public function survey_coupons()
    {
        return $this->belongsTo(SurveyCoupon::class);
    }
}