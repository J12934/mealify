<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Storage;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $storedIngredients = $user->generateIngredientList();

        $queryBuilder = DB::table('ingredient_recipe');

        foreach ($storedIngredients as $storedIngredient){
            $queryBuilder->orWhere('ingredient_id', $storedIngredient['id'])->where('amount', '<=', $storedIngredient['amount']);
        }

        dd($queryBuilder->get());


//        $params = $user->generateIngredientList()->map(function ($item){
//            return [ 'amount', '=<', $item['amount'] ];
//        });
//
//        // Retrieve all posts with at least one comment containing words like foo%
//        $recipes = Recipe::whereDoesntHave('ingredients', function ($query) {
//            $query->where(DB::raw('ingredients.id = 1 and ingredients.amount '));
//        })->get();
//
//        dd($recipes);
    }
}
