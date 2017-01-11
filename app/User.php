<?php

namespace App;

use App\Recipe;
use App\Ingredient;

use App\Interfaces\GeneratesIngredientList;

use App\Traits\CompressesIngredientList;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements GeneratesIngredientList
{
    use Notifiable, CompressesIngredientList;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recipes()
    {
        return $this->hasMany( 'App\Recipe' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meals()
    {
        return $this->hasMany( 'App\Meal' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function storages()
    {
        return $this->hasMany( 'App\Storage' );
    }

    /**
     * Returns true if the User has all the necessary Ingredients to cook the Recipe
     * @return boolean
     * TODO
     */
    public function canCook(Recipe $recipe){
        $ingredients = $recipe->ingredients;

        foreach ($ingredients as $ingredient) {
            if(!$this->hasSufficientOfIngredient($ingredient, $ingredient->pivot->amount)){
                return false;
            }
        }

        return true;
    }

    /**
     * Returns how much of the Ingredient is stored ofer all storages of the user
     * @return number
     */
    public function amountOfIngredientStored(Ingredient $ingredient){
        return $this->storages->sum(function (Storage $storage) use ($ingredient){
            return $storage->ingredientAmmount($ingredient);
        });
    }

    /**
     * Returns true if the User has enough of the ingredient
     * @return boolean
     */
    public function hasSufficientOfIngredient(Ingredient $ingredient, $amount){
        return $this->amountOfIngredientStored($ingredient) >= $amount;
    }



    function generateIngredientList()
    {
        return $this->compressIngredientList( $this->storages->flatMap(function ($item){
            return $item->generateIngredientList();
        }) );
    }
}
