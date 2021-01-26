<?php
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionnaireController;


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/maclasses/create', 'GroupeController@create');
Route::post('/maclasses', 'GroupeController@store');
Route::get('/maclasses/{groupeClasse}', 'GroupeController@show');

Route::get('/questionnaires/create', 'QuestionnaireController@create');
Route::post('/questionnaires','QuestionnaireController@store');
Route::get('/questionnaires/{questionnaire}','QuestionnaireController@show');

Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create');
Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@store');

Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@destroy');
Route::get('/surveys/{questionnaire}-{slug}','EnqueteController@show');

Route::post('/surveys/{questionnaire}-{slug}', 'EnqueteController@store');

Route::get('/surveys/merci', 'SurveyController@merci');
