<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        Category::create(['title'=>'Account']);
        Category::create(['title'=>'Basic']);
        Category::create(['title'=>'Delivery']);
        Category::create(['title'=>'Mobile']);
        Category::create(['title'=>'Payments']);
        Category::create(['title'=>'Privacy']);
    }
}
