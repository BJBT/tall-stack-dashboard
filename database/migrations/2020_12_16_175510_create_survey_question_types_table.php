<?php

use App\Models\SurveyQuestionType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyQuestionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_question_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $types = [
            'text',
            'radio',
            'multiple choice',
            'date',
            'number_in_range',
        ];

        foreach($types as $type)
        {
            SurveyQuestionType::firstOrCreate([
                'name'=>$type
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_question_types');
    }
}
