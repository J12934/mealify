<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category-recipe', function (Blueprint $table) {
            $table->integer( 'category_id' )->unsigned();
            $table->integer( 'recipe_id' )->unsigned();

            $table->timestamps();

            $table->foreign( 'category_id' )->references( 'id' )->on( 'categories' );
            $table->foreign( 'recipe_id' )->references( 'id' )->on( 'recipes' );

            $table->primary( [ 'category_id', 'recipe_id' ] );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category-recipe');
    }
}
