<?php

namespace App;

class IngredientList
{
    protected $ingredients;

    public function __construct(Recipe $recipe)
    {
        $this->ingredients = [];

        foreach($recipe->ingredients as $ingredient){
            $this->ingredients[$ingredient->id] = [
                'ingredient' => $ingredient,
                'amount' => $ingredient->pivot->amount
            ];
        }
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }

    public function take(Ingredient $ingredient, $amount)
    {
        $this->ingredients[$ingredient->id]['amount'] = $this->ingredients[$ingredient->id]['amount'] - $amount;
    }
}
