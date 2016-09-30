<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Recipe;
use App\Meal;

class ExploreController extends Controller
{
    /**
     *
     */
    public function index(){
        $recipes = Recipe::orderBy('created_at')->take(6)->get();
        $meals = Meal::orderBy('created_at')->take(3)->get();

        return view('explore.index', [
            'name'    => 'explore',
            'recipes' => $recipes,
            'meals' => $meals
        ]);
    }
}
