<?php

use App\Categories;
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

        Categories::create(['title'=>'Account']);
        Categories::create(['title'=>'Basic']);
        Categories::create(['title'=>'Delivery']);
        Categories::create(['title'=>'Mobile']);
        Categories::create(['title'=>'Payments']);
        Categories::create(['title'=>'Privacy']);
    }
}
