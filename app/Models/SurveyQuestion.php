<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function choices()
    {
        return $this->hasMany(SurveyQuestionChoice::class)->orderBy('ordinality');
    }

    public function type()
    {
        return $this->belongsTo(SurveyQuestionType::class, 'surveyquestiontype_id');
    }

    public function has_choices()
    {
        return in_array($this->type->name, ['radio', 'multiple choice']);
    }
}
