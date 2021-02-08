<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\SurveyQuestionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SurveysController extends Controller
{
    public function index()
    {
        $surveys = Survey::paginate(5);

        return view('survey', compact('surveys'));
    }

    public function update()
    {
        $survey_values = request('survey');

        Survey::where('id', '>', 0)->update([
            'is_active' => 0
        ]);

        foreach ($survey_values as $key => $survey_value)
        {
            $survey = Survey::find($key);

            $file = $survey_value['survey_image'] ?? null;
            if ($file)
            {
                $fileNameWithExt = $file->getClientOriginalName();
                $fileName        = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension       = $file->getClientOriginalExtension();
                $storedName      = $fileName . '.' . $extension;
                $stored_file     = Storage::putFileAs("uploaded_files/survey_images", $file, $storedName);
                $survey->update([
                    'image_url' => $stored_file,
                ]);
            }

            $active_value = $survey_value['is_active'] ?? 0;

            $survey->update([
                'ordinality' => $survey_value['ordinality'],
                'is_active'  => $active_value,
                'initial_message' => $survey_value['initial_message']
            ]);
        }

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);


        $values      = request()->except('_token');
        $file        = $values['image_url'] ?? null;
        $stored_file = null;
        if ($file)
        {
            $fileNameWithExt = $file->getClientOriginalName();
            $fileName        = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension       = $file->getClientOriginalExtension();
            $storedName      = $fileName . '.' . $extension;
            $stored_file     = Storage::putFileAs("uploaded_files/survey_images", $file, $storedName);
        }


        Survey::create([
            'name'                 => $request->name,
            'ordinality'           => $request->ordinality,
            'initial_message'      => $request->initial_message,
            'image_url'            => $stored_file,
        ]);

        return redirect()->back();

    }

    public function show(Survey $survey, SurveyQuestion $surveyQuestion)
    {
        $survey->load('questions.survey');

        $question_type_names = SurveyQuestionType::pluck('name', 'id');

        return view('survey_question', compact('survey', 'surveyQuestion', 'question_type_names'));
    }

    public function delete(Survey $survey)
    {
        $survey->questions()->delete();
        $survey->delete();

        return redirect()->back();
    }

    public function remove_image(Survey $survey)
    {
        $survey->image_url = null;
        $survey->save();

        return redirect()->back();
    }
}
