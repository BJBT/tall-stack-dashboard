<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ImagePathController;
use App\Http\Controllers\SurveyQuestionChoicesController;
use App\Http\Controllers\SurveyQuestionsController;
use App\Http\Controllers\SurveysController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::get('/dashboard', [DashController::class, 'index'])->name('dash');

    Route::get('/surveys', [SurveysController::class, 'index'])->name('surveys.show');
    Route::post('/surveys/update', [SurveysController::class, 'update'])->name('surveys.update');
    Route::post('/surveys', [SurveysController::class, 'store'])->name('survey.create');
    Route::get('/surveys/{survey}', [SurveysController::class, 'delete'])->name('survey.delete');
    Route::get('/{survey}remove_image', [SurveysController::class, 'remove_image'])->name('survey.remove_image');

    Route::get('/survey_questions/{survey}', [SurveysController::class, 'show'])->name('questions.show');
    Route::post('/survey_questions/{survey}', [SurveyQuestionsController::class, 'store'])->name('question.create');
    Route::post('/survey_questions/{survey}/update', [SurveyQuestionsController::class, 'update'])->name('questions.update');
    Route::get('/survey_questions/{surveyQuestion}/delete', [SurveyQuestionsController::class, 'delete'])->name('question.delete');

    Route::get('/question_choices/{surveyQuestion}', [SurveyQuestionsController::class, 'show'])->name('choices.show');

    Route::post('/question_choices/{surveyQuestion}', [SurveyQuestionChoicesController::class, 'store'])->name('choice.create');
    Route::post('/question_choices/{surveyQuestion}/update', [SurveyQuestionChoicesController::class, 'update'])->name('choice.update');
    Route::get('/question_choices/{surveyQuestionChoice}/delete', [SurveyQuestionChoicesController::class, 'delete'])->name('choice.delete');


    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.show');

    Route::get('/images/message_images/{survey}', [ImagePathController::class, 'get_survey_image'])->name('images.survey_image');


    Route::post('logout', LogoutController::class)
        ->name('logout');
});
