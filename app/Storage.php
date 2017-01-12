<?php

namespace App;

use App\IngredientList;
use App\ExtractionLog;

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
     * Returns a instance of the Same Ingredient but Stored in storage
     * Returns null if non present
     */
    public function getStoredIngredient(Ingredient $ingredient)
    {
        return $this->ingredients->where('id', $ingredient->id)->first();
    }
    /**
     * Returns how much of the ingredient is stored
     */
    public function ingredientAmmount(Ingredient $ingredient)
    {
        $storedIngredient = $this->getStoredIngredient($ingredient);
        if($storedIngredient != null){
            return $storedIngredient->pivot->amount;
        }

        return 0;
    }

    /**
     * Takes Item from Storage by Recipe
     * Returns an Array of Ingrediens
     */
    public function takeIngredients(IngredientList $list, ExtractionLog $extractionLog)
    {
        foreach ($list->getIngredients() as $item) {
            $amountTaken = $this->takeIngredient($item['ingredient'], $item['amount']);

            if($amountTaken > 0){
                $extractionLog->add('Take ' . $amountTaken . $item['ingredient']->unit . ' of ' . $item['ingredient']->name .' from ' . $this->name);
            }

            $list->take($item['ingredient'], $amountTaken);
        }
    }

    /**
     * Takes an Ingredient from Storage
     * If the Storage Unit doesnt have enough stored it will take as much as possible
     * Returns the Ammout Taken from Storage
     */
    public function takeIngredient(Ingredient $ingredient, $amount)
    {
        //Make sure only to take it if the Storage has enough;
        $amountStored = $this->ingredientAmmount($ingredient);
        $amountToTake = $amount > $amountStored ? $amountStored : $amount;

        if($amountToTake === 0){
            return 0;
        }

        $this->ingredients()->updateExistingPivot($ingredient->id, [ 'amount' => $amountStored - $amountToTake]);

        return $amountToTake;
    }
}
