<?php

namespace App;

use App\Interfaces\GeneratesIngredientList;
use App\Traits\GenerateIngredientList;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model implements GeneratesIngredientList
{
    use GenerateIngredientList;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    /**
     * @var array Contains Attributes that should be converted to a Carbon Timestamp
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getActualPriceAttribute()
    {
        return $this->ingredients->sum('actual_price');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo( 'App\User' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function meals()
    {
        return $this->belongsToMany( 'App\Meal' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ingredients()
    {
        return $this->belongsToMany( 'App\Ingredient' )->withPivot( 'amount' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany( 'App\Category' );
    }

    public static function cookableBy(User $user)
    {
        $recipes = Recipe::all();

        return $recipes->filter(function (Recipe $recipe) use ($user){
            return $user->canCook($recipe);
        });
    }

    public function isAllowedToBeSeenBy($user)
    {
        if ($user == null)
            return false;
        return $user->id == $this['user_id'];
    }
}
