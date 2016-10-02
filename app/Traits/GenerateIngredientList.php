<?php
/**
 * Created by PhpStorm.
 * User: Jannik
 * Date: 02.10.2016
 * Time: 22:52
 */

namespace App\Traits;

trait GenerateIngredientList
{
    function generateIngredientList()
    {
        return $this->ingredients->map( function ( $item ) {
            return collect([
                'id'     => $item->id,
                'name'   => $item->name,
                'unit'   => $item->unit,
                'price'  => $item->price,
                'amount' => $item->pivot->amount
            ]);
        } );
    }
}