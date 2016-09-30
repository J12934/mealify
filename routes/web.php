<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'ExploreController@index');

Route::get('recipe/', 'RecipeController@index')->name('recipe.index');
Route::get('recipe/{id}', 'RecipeController@show')->name('recipe.show');


Route::get('user/recipes', 'RecipeController@indexUserRecipes')->name('user.recipes');

Route::get('meal/', 'MealController@index')->name('meal.index');
Route::get('meal/{id}', 'MealController@show')->name('meal.show');

Auth::routes();