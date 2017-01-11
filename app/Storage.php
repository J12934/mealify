<?php

namespace App;

use App\Interfaces\GeneratesIngredientList;
use App\Traits\GenerateIngredientList;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model implements GeneratesIngredientList
{
    use GenerateIngredientList;

    protected $fillable = [
        'name'
    ];

    public function ingredients()
    {
        return $this->belongsToMany( 'App\Ingredient' )->withPivot( 'amount' );
    }


    /**
     * Returns how much of the ingredient is stored
     */
    public function ingredientAmmount(Ingredient $ingredient)
    {
        $storedIngredient = $this->ingredients->where('id', $ingredient->id)->first();
        if($storedIngredient != null){
            return $storedIngredient->pivot->amount;
        }

        return 0;
    }
}
