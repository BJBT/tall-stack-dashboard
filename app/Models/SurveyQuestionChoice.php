<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyQuestionChoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'survey_question_choices';

    public function surveyquestion()
    {
        return $this->belongsTo(SurveyQuestion::class, 'survey_question_id');
    }
}
