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
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Jannik Hollenbach',
            'email' => 'jannik@hollenbach.de',
            'password' => bcrypt('123456')
        ]);

        DB::table( 'recipes' )->insert( [
            [
              'name'        => 'Restaurant-Style Zuppa Toscana',
              'description' => '',
              'image'       => 'http://images.media-allrecipes.com/userphotos/720x405/1515920.jpg',
              'user_id'     => 1
          ], [
              'name'        => 'Restaurant-Style Taco Meat Seasoning',
              'description' => '',
              'image'       => 'http://images.media-allrecipes.com/userphotos/720x405/1040396.jpg',
              'user_id'     => 1
          ],[
              'name'        => 'Lasagna',
              'description' => '',
              'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/111/111218/882693-960x720-lasagne-bolognese.jpg',
              'user_id'     => 1
          ],[
              'name'        => 'Pancake',
              'description' => '',
              'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/121/121438/723647-960x720-pfannenkuchen-pfannkuchen-pfannekuchen-eierkuchen.jpg',
              'user_id'     => 1
          ],[
              'name'        => 'Big Kahuna Burger',
              'description' => '',
              'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/56/56500/672420-960x720-big-kahuna-burger.jpg',
              'user_id'     => 1
          ],[
              'name'        => 'Brownies',
              'description' => '',
              'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/48/48759/740515-960x720-american-double-choc-brownies.jpg',
              'user_id'     => 1
          ],[
              'name'        => 'Tomato Soup',
              'description' => '',
              'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/137/137375/805551-960x720-frische-tomatensuppe.jpg',
              'user_id'     => 1
          ],[
              'name'        => 'Chilli con Carne',
              'description' => '',
              'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/103/103593/894965-960x720-texas-chili-con-carne.jpg',
              'user_id'     => 1
          ],[
              'name'        => 'Cheesecake',
              'description' => '',
              'image'       => 'http://static.chefkoch-cdn.de/ck.de/rezepte/131/131654/929437-960x720-k-sekuchen-von-tante-gertrud.jpg',
              'user_id'     => 1
          ],
        ] );
    }
}
