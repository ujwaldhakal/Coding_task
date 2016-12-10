<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['uses' => 'SurveyController@index','as' => 'surveyList']);

Route::group(['prefix' => 'survey'],function(){
    Route::get('form',['uses' => 'SurveyController@form','as' => 'surveyForm']);
    Route::post('save',['uses' => 'SurveyController@save','as' => 'saveSurvey']);
});
