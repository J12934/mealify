<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
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

    public function isAllowedToBeSeenBy($user)
    {
        if ($user == null)
            return false;
        return $user->id == $this['user_id'];
    }
}
