<?php

use Illuminate\Http\Request;

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

Route::get('/ingredients/{query}', function ($query) {
    return \App\Ingredient::where('name', 'like', '%' . $query . '%')->select('id', 'unit', 'name')->get();
});
