<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Recipe;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class ShoppingListController extends Controller
{
    public function generateFromRecipe($id)
    {
        $user = Auth::user();
        $recipe = Recipe::findOrFail($id);

        return view('shopping_list.recipe', [
            'recipe' => $recipe,
            'diff' => $this->generateList($recipe->generateIngredientList(), $user->generateIngredientList())
        ]);
    }

    public function generateFrommeal($id)
    {
        $user = Auth::user();
        $meal = Meal::findOrFail($id);

        return view('shopping_list.meal', [
            'meal' => $meal,
            'diff' => $this->generateList($meal->generateIngredientList(), $user->generateIngredientList())
        ]);
    }



    private function generateList(Collection $required, Collection $available)
    {
        $list = $required->map(function($item) use ($available){
            if($available->contains('id', $item['id'])){
                $item['amount'] -= $available[$item['id']]['amount'];
            }
            return $item;
        })->filter(function ($item){
            return $item['amount'] > 0;
        })->map(function($item){
            $item['absulute_price'] = ($item['amount'] / $item['count_by']) * $item['price'];

            return $item;
        });

        return [
            'total_costs' => $list->sum('absulute_price'),
            'list' => $list
        ];
    }
}
