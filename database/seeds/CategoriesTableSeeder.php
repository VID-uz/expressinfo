<?php

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
        factory(\App\Models\CatalogCategory::class)->create([
            'parent_id' => 0
        ]);
        factory(\App\Models\CatalogCategory::class, 10)->create();
    }
}
