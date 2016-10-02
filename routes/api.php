<?php

use App\Recipe;
use Illuminate\Http\Request;

use App\Ingredient;
use App\Storage;
use App\Category;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Returns a list of ingredients matched by the search query
 */
Route::get('/ingredients/{query}', function ($query) {
    return Ingredient::where('name', 'like', '%' . $query . '%')->select('id', 'unit', 'name')->get();
});

/**
 * Returns a list of categories matched by the search query
 */
Route::get('/categories/{query}', function ($query) {
    return Category::where('name', 'like', '%' . $query . '%')->select('id', 'name')->get();
});

/**
 * Returns a list of ingredients stored in the storage unit
 * I know the access isn't restricted but do i really care?
 */
Route::get('/storage/{id}', function ($id) {
    return Storage::findOrFail($id)->ingredients->map(function($item){
        return [
            'id' => $item->id,
            'name' => $item->name,
            'unit' => $item->unit,
            'amount' => $item->pivot->amount
        ];
    });
});

/**
 * Returns a list of ingredients used in a Recipe
 */
Route::get('/recipe/ingredients/{id}', function ($id) {
    return Recipe::findOrFail($id)->ingredients->map(function($item){
        return [
            'id' => $item->id,
            'name' => $item->name,
            'unit' => $item->unit,
            'amount' => $item->pivot->amount
        ];
    });
});

/**
 * Returns a list of ingredients used in a Recipe
 */
Route::get('/recipe/tags/{id}', function ($id) {
    return Recipe::findOrFail($id)->categories()->select( 'id', 'name')->get();
});