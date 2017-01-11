<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Storage;
use App\Ingredient;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        $recipes = Recipe::cookableBy(Auth::user());

        return view('recipe.cookable', [
            'recipes' => $recipes
        ]);
    }
}
