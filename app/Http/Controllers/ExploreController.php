<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Recipe;

class ExploreController extends Controller
{
    /**
     *
     */
    public function index(){
        $recipes = Recipe::take(6)->get();

        return view('explore.index', [
            'name'    => 'explore',
            'recipes' => $recipes
        ]);
    }
}
