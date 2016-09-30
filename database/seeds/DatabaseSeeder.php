<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Recipe;
use App\Meal;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create( [
            'name'     => 'Jannik Hollenbach',
            'email'    => 'jannik@hollenbach.de',
            'password' => bcrypt( '123456' )
        ] );

        Recipe::create( [
            'name'        => 'Restaurant-Style Zuppa Toscana',
            'description' => '<h6>Step 1</h6>
<p>Heat oven to 300 degrees F (150 degrees C).</p>
<h6>Step 2</h6>
<p>Place sausage links onto a sheet pan and bake for 25 minutes, or until done. Cut links in half lengthwise, then cut at an angle into 1/2-inch slices.</p>
<h6>Step 3</h6>
<p>Place onions and bacon slices in a large saucepan and cook over medium heat until onions are almost clear. Remove bacon and crumble. Set aside.</p>
<h6>Step 4</h6>
<p>Add garlic to the onions and cook an additional 1 minute. Add chicken soup base, water, and potatoes, simmer 15 minutes.</p>
<h6>Step 5</h6>
<p>Add crumbled bacon, sausage, kale, and cream. Simmer 4 minutes and serve.</p>
<h4>Enjoy your Meal!</h4>',
            'image'       => 'http://images.media-allrecipes.com/userphotos/720x405/1515920.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Restaurant-Style Taco Meat Seasoning',
            'description' => '',
            'image'       => 'http://images.media-allrecipes.com/userphotos/720x405/1040396.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Lasagna',
            'description' => '',
            'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/111/111218/882693-960x720-lasagne-bolognese.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Pancake',
            'description' => '',
            'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/121/121438/723647-960x720-pfannenkuchen-pfannkuchen-pfannekuchen-eierkuchen.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Big Kahuna Burger',
            'description' => '',
            'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/56/56500/672420-960x720-big-kahuna-burger.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Brownies',
            'description' => '',
            'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/48/48759/740515-960x720-american-double-choc-brownies.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Tomato Soup',
            'description' => '',
            'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/137/137375/805551-960x720-frische-tomatensuppe.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Chilli con Carne',
            'description' => '',
            'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/103/103593/894965-960x720-texas-chili-con-carne.jpg',
            'user_id'     => 1
        ] );
        Recipe::create( [
            'name'        => 'Cheesecake',
            'description' => '',
            'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/131/131654/929437-960x720-k-sekuchen-von-tante-gertrud.jpg',
            'user_id'     => 1
        ] );

        Meal::create( [
            'name' => 'Small Menue for 4 People',
            'description' => '',
            'user_id' => 1
        ])->recipes()
            ->sync([
            1 => [ 'title' => 'First Dish'],
            2 => [ 'title' => 'Second Dish'],
            3 => [ 'title' => 'Third Dish']
        ]);
    }
}
