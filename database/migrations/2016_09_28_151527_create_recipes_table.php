<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string( 'name', 255);
            $table->text( 'description' );
            $table->string( 'image', 255);
            $table->string( 'calories', 255 )->nullable();

            $table->integer( 'user_id' )->unsigned();

            $table->foreign( 'user_id')->references( 'id' )->on( 'users' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
