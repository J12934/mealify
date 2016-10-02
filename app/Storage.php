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
}
