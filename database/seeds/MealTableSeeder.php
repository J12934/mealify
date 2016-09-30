<?php

use App\Meal;
use Illuminate\Database\Seeder;

class MealTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $numberOfSentences = 24;

        Meal::create( [
            'name'        => 'Small Menue for 4 People',
            'description' => $faker->sentences( $numberOfSentences, true ),
            'user_id'     => 1
        ] )->recipes()
            ->sync( [
                1 => [ 'title' => 'First Dish' ],
                2 => [ 'title' => 'Second Dish' ],
                3 => [ 'title' => 'Third Dish' ]
            ] );

        Meal::create( [
            'name'        => 'Large Menue for 6 People',
            'description' => $faker->sentences( $numberOfSentences, true ),
            'user_id'     => 1
        ] )->recipes()
            ->sync( [
                6 => [ 'title' => 'First Dish' ],
                1 => [ 'title' => 'Second Dish' ],
                7 => [ 'title' => 'Third Dish' ],
                4 => [ 'title' => 'Fourth Dish' ],
            ] );
    }
}
