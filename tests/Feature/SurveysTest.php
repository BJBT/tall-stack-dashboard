<?php

namespace Tests\Feature;

use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\User;
use Tests\TestCase;

class SurveysTest extends TestCase
{
    public function setUp() :void
    {
        parent::setUp();

        User::where('id', '>', 0)->delete();
        Survey::where('id', '>', 0)->delete();
        SurveyQuestion::where('id', '>', 0)->delete();

        $user = User::factory()->create();
        auth()->login($user);
    }

    /** @test */
    public function can_create_a_new_survey_from_front_end()
    {
        $name = 'New Survey';
        $message = 'New Message';
        $ordinality = 1;

        $this->visitRoute('surveys.show');
        $this->type($name, 'name');
        $this->type($message, 'initial_message');
        $this->type($ordinality, 'ordinality');
        $this->press('Add');
        $this->seePageIs(route('surveys.show'));

        $survey = Survey::first();
        $this->assertEquals('New Survey', $survey->name);
        $this->assertEquals('New Message', $survey->initial_message);
        $this->assertEquals(1, $survey->ordinality);
    }

    /** @test */
    public function can_update_surveys_from_front_end()
    {
        $old_message = 'Old Message';
        $old_ordinality = 2;

        $new_message = 'New Message';
        $new_ordinality = 1;

        $survey = Survey::factory()->create([
            'initial_message' => $old_message,
            'ordinality' => $old_ordinality
        ]);

        $this->visitRoute('surveys.show');
        $this->seeInField("survey[{$survey->id}][initial_message]", $old_message);
        $this->type($new_message, "survey[{$survey->id}][initial_message]");
        $this->type($new_ordinality, "survey[{$survey->id}][ordinality]");
        $this->press('Update');
        $this->seePageIs(route('surveys.show'));
    }

    /** @test */
    public function can_create_a_new_survey_question_from_front_end()
    {
        $name = 'New Q';
        $type = 3;
        $ordinality = 1;

        $survey = Survey::factory()->create();

        $this->visitRoute('questions.show', $survey);
        $this->type($name, 'name');
        $this->select($type, 'surveyquestiontype_id');
        $this->type($ordinality, 'ordinality');
        $this->press('Add');
        $this->seePageIs(route('questions.show', $survey));

        $question = SurveyQuestion::first();
        $this->assertEquals('New Q', $question->name);
        $this->assertEquals(1, $question->ordinality);
    }

    /** @test */
    public function can_update_a_survey_question_from_front_end()
    {
        $old_name = 'Old Q';
        $old_type = 1;
        $old_ordinality = 2;

        $new_name = 'New Q';
        $new_type = 3;
        $new_ordinality = 1;

        $survey = Survey::factory()->create();
        $surveyQuestion = SurveyQuestion::factory()->create([
            'survey_id' => $survey->id,
            'name' => $old_name,
            'surveyquestiontype_id' => $old_type,
            'ordinality' => $old_ordinality
        ]);

        $this->visitRoute('questions.show', $survey);
        $this->type($new_name, "questions[{$surveyQuestion->id}][name]");
        $this->select($new_type, "questions[{$surveyQuestion->id}][surveyquestiontype_id]");
        $this->type($new_ordinality, "questions[{$surveyQuestion->id}][ordinality]");
        $this->press('Update Questions');
        $this->seePageIs(route('questions.show', $survey));

        $question = SurveyQuestion::first();
        $this->assertEquals('New Q', $question->name);
        $this->assertEquals(1, $question->ordinality);
    }
}
