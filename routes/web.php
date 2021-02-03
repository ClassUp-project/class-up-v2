<?php
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionnaireController;


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route vers le choix et vue de la classe
Route::get('/maclasses/create', 'GroupeController@create');
Route::post('/maclasses', 'GroupeController@store');
Route::get('/maclasses/{idutilisateur}', 'GroupeController@show')->name('classe');

//Route vers les questionnaires, questions, réponses, enquetes
//Questionnaire
Route::get('/questionnaires/create', 'QuestionnaireController@create');
Route::post('/questionnaires','QuestionnaireController@store');
Route::get('/questionnaires/{questionnaire}','QuestionnaireController@show');

//Questions
Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create');
Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@store');

//Enquete
Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@destroy');
Route::get('/surveys/{questionnaire}-{slug}','EnqueteController@show');
Route::post('/surveys/{questionnaire}-{slug}', 'EnqueteController@store');

Route::get('/surveys/merci', 'SurveyController@merci');


//Route vers les choix et vue des matières
Route::get('/matieres/create', 'MatiereController@create');
Route::post('/matieres', 'MatiereController@store');
Route::get('/matières/{matiere}', 'MatiereController@show');
