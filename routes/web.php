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
Route::get('recipe/create', 'RecipeController@create')->name('recipe.create');
Route::get('recipe/{id}', 'RecipeController@show')->name('recipe.show');
Route::post('recipe/', 'RecipeController@store')->name('recipe.store');

Route::get('user/recipes', 'RecipeController@indexUserRecipes')->name('user.recipes');

Route::get('meal/', 'MealController@index')->name('meal.index');
Route::get('meal/{id}', 'MealController@show')->name('meal.show');

Route::get('storage', 'StorageController@index')->name('storage.index');
Route::get('storage/{storage}/ingredient/{ingredient}', 'StorageController@editIngredient')->name('storage.ingredient.edit');
Route::patch('storage/{storage}/ingredient/{ingredient}', 'StorageController@updateIngredient')->name('storage.ingredient.update');

Auth::routes();