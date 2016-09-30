<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
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

    public function getIngredients()
    {
        return $this
            ->recipes
            ->flatMap(function ($item){
                return $item->ingredients;
            })
            ->groupBy('id')
            ->map(function ($item){
                return [
                    'name' => $item[0]->name,
                    'unit' => $item[0]->unit,
                    'amount' => $item->sum('pivot.amount'),
                    'price' => $item->sum('actual_price'),
                ] ;
            });
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
}
