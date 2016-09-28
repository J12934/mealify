<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient-recipe', function (Blueprint $table) {
            $table->integer( 'ingredient_id' )->unsigned();
            $table->integer( 'recipe_id' )->unsigned();

            $table->timestamps();
            
            $table->foreign( 'ingredient_id' )->references( 'id' )->on( 'ingredients' );
            $table->foreign( 'recipe_id' )->references( 'id' )->on( 'recipes' );

            $table->primary( [ 'ingredient_id', 'recipe_id' ] );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient-recipe');
    }
}
