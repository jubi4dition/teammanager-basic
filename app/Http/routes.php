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

Route::get('/', 'WelcomeController@index');
Route::get('login', 'WelcomeController@index');
Route::post('login', 'WelcomeController@postLogin');

Route::any('logout', function()
{
    \Auth::logout();
    
    return redirect('login');
});

Route::get('persons', array('uses' => 'PersonController@index', 'as' => 'persons'));
Route::get('person/new', array('uses' => 'PersonController@getNew', 'as' => 'person.new'));
Route::post('person/new', 'PersonController@postNew');
Route::get('person/{id}/edit', array('uses' => 'PersonController@getEdit', 'as' => 'person.edit'));
Route::any('person/{id}/edit/{field}', array('uses' => 'PersonController@postEditField', 'as' => 'person.edit-field'));
Route::any('person/{id}/remove', array('uses' => 'PersonController@remove', 'as' => 'person.remove'));
Route::any('person/{id}/removeteam/{team_id}', array('uses' => 'PersonController@removeTeam', 'as' => 'person.removeTeam'));
Route::any('person/{id}/addteam', array('uses' => 'PersonController@addTeam', 'as' => 'person.addTeam'));

Route::get('teams', array('uses' => 'TeamController@index', 'as' => 'teams'));
Route::get('team/new', array('uses' => 'TeamController@getNew', 'as' => 'team.new'));
Route::post('team/new', 'TeamController@postNew');
Route::get('team/{id}/edit', array('uses' => 'TeamController@getEdit', 'as' => 'team.edit'));
Route::any('team/{id}/edit/{field}', array('uses' => 'TeamController@postEditField', 'as' => 'team.edit-field'));
Route::any('team/{id}/remove', array('uses' => 'TeamController@remove', 'as' => 'team.remove'));
Route::any('team/{id}/removeperson/{person_id}', array('uses' => 'TeamController@removePerson', 'as' => 'team.removePerson'));
Route::any('team/{id}/addperson', array('uses' => 'TeamController@addPerson', 'as' => 'team.addPerson'));
Route::get('teams-and-persons', 'TeamController@teamsandpersons');

Route::get('home', 'HomeController@index');
