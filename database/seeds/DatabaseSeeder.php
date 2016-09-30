<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try{
            $this->call( UserTableSeeder::class );
            $this->call( RecipeTableSeeder::class );
            $this->call( MealTableSeeder::class );
        }catch(Exception $e){
            dd($e->getTraceAsString());
        }
    }
}
