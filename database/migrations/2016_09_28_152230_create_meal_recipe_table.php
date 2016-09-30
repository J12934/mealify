<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_recipe', function (Blueprint $table) {
            $table->integer( 'meal_id' )->unsigned();
            $table->integer( 'recipe_id' )->unsigned();

            $table->string( 'title', 255)->nullable()->comment('A descriptive Title for the current dish');

            $table->timestamps();

            $table->foreign( 'meal_id' )->references( 'id' )->on( 'meals' );
            $table->foreign( 'recipe_id' )->references( 'id' )->on( 'recipes' );

            $table->primary( [ 'meal_id', 'recipe_id' ] );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_recipe');
    }
}
