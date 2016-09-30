<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string( 'name' );
            $table->string( 'unit' )->comment( 'Name of the Unit the Ingredient is measured in.' );
            $table->decimal( 'price' )->comment( 'The price of the Ingredient.' );
            $table->decimal( 'count_by' )->comment( 'Determines the amount of the Ingredient the Price should be for.' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
