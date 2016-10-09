<?php

namespace App;

use App\Interfaces\GeneratesIngredientList;

use App\Traits\CompressesIngredientList;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model implements GeneratesIngredientList
{
    use CompressesIngredientList;

    protected $fillable = [
        'name',
        'description'
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
        return $this
            ->recipes
            ->sum('actual_price');
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
    public function recipes()
    {
        return $this->belongsToMany( 'App\Recipe' )->withPivot( 'title' );
    }

    function generateIngredientList()
    {
        return $this->compressIngredientList( $this->recipes->flatMap(function ($item){
            return $item->generateIngredientList();
        }) );
    }

    public function isAllowedToBeSeenBy($user)
    {
        if ($user == null)
            return false;
        return $user->id == $this['user_id'];
    }
}
