<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;

class SurveyQuestionsController extends Controller
{
    public function show(SurveyQuestion $surveyQuestion)
    {
        $surveyQuestion->load('choices.surveyQuestion');

        $survey = $surveyQuestion->survey;

        return view('question_choice', compact('surveyQuestion', 'survey'));
    }

    public function store(Request $request, Survey $survey)
    {
        $this->validate($request, [
            'name'                  => 'required',
            'surveyquestiontype_id' => 'required',
        ]);

        SurveyQuestion::create([
            'survey_id' => $survey->id,
            'name' => $request->name,
            'surveyquestiontype_id' => $request->surveyquestiontype_id,
            'ordinality'               => $request->ordinality,
        ]);

        return back();
    }

    public function update()
    {
        $question_values = request('questions');

        foreach ($question_values as $key => $question_value)
        {
            $surveyQuestion = SurveyQuestion::find($key);

            $surveyQuestion->update([
               'name' => $question_value['name'],
               'surveyquestiontype_id' => $question_value['surveyquestiontype_id'],
                'ordinality' => $question_value['ordinality']
            ]);

            return redirect()->back();
        }
    }

    public function delete(SurveyQuestion $surveyQuestion)
    {
        $surveyQuestion->choices()->delete();
        $surveyQuestion->delete();

        $survey = $surveyQuestion->survey;

        return redirect(route('questions.show', $survey));
    }
}
