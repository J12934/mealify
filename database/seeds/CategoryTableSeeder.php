<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([ //1
            'name' => 'appetizer'
        ]);
        Category::create([ //2
            'name' => 'main-dish'
        ]);
        Category::create([ //3
            'name' => 'dessert'
        ]);
        Category::create([ //4
            'name' => 'cake'
        ]);
        Category::create([ //5
            'name' => 'cocktails'
        ]);
        Category::create([ //6
            'name' => 'snack'
        ]);
        Category::create([ //7
            'name' => 'vegetarian'
        ]);
        Category::create([ //8
            'name' => 'vegan'
        ]);
        Category::create([ //9
            'name' => 'gluten free'
        ]);
    }
}
