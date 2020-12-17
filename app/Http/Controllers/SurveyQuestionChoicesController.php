<?php

namespace App\Http\Controllers;

use App\Models\SurveyQuestion;
use App\Models\SurveyQuestionChoice;
use Illuminate\Http\Request;

class SurveyQuestionChoicesController extends Controller
{
    public function store(Request $request, SurveyQuestion $surveyQuestion)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        SurveyQuestionChoice::create([
            'survey_question_id' => $surveyQuestion->id,
            'name' => $request->name,
            'ordinality' => $request->ordinality
        ]);

        return redirect()->back();
    }

    public function update()
    {
        $choice_values = request('choices');

        foreach ($choice_values as $key => $choice_value)
        {
            $choice = SurveyQuestionChoice::find($key);

            $choice->update([
                'name' => $choice_value['name'],
                'ordinality' => $choice_value['ordinality']
            ]);

            return redirect()->back();
        }
    }

    public function delete(SurveyQuestionChoice $surveyQuestionChoice)
    {
        $surveyQuestionChoice->delete();

        return redirect()->back();
    }
}
