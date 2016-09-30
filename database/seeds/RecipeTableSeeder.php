<?php

use App\Recipe;
use Illuminate\Database\Seeder;

class RecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        $numberOfSentences = 28;

        Recipe::create( [
            'name'        => 'Restaurant-Style Zuppa Toscana',
            'description' => $faker->sentences($numberOfSentences, true),
            'image'       => 'http://images.media-allrecipes.com/userphotos/720x405/1515920.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Restaurant-Style Taco Meat Seasoning',
            'description' => $faker->sentences($numberOfSentences, true),
            'image'       => 'http://images.media-allrecipes.com/userphotos/720x405/1040396.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Lasagna',
            'description' => $faker->sentences($numberOfSentences, true),
            'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/111/111218/882693-960x720-lasagne-bolognese.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Pancake',
            'description' => $faker->sentences($numberOfSentences, true),
            'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/121/121438/723647-960x720-pfannenkuchen-pfannkuchen-pfannekuchen-eierkuchen.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Big Kahuna Burger',
            'description' => $faker->sentences($numberOfSentences, true),
            'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/56/56500/672420-960x720-big-kahuna-burger.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Brownies',
            'description' => $faker->sentences($numberOfSentences, true),
            'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/48/48759/740515-960x720-american-double-choc-brownies.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Tomato Soup',
            'description' => $faker->sentences($numberOfSentences, true),
            'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/137/137375/805551-960x720-frische-tomatensuppe.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Chilli con Carne',
            'description' => $faker->sentences($numberOfSentences, true),
            'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/103/103593/894965-960x720-texas-chili-con-carne.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Cheesecake',
            'description' => $faker->sentences($numberOfSentences, true),
            'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/131/131654/929437-960x720-k-sekuchen-von-tante-gertrud.jpg',
            'user_id'     => 1
        ] );
    }
}
