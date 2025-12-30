<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Blair Haney',
                'slug' => 'blair-haney',
                'status' => 'inactive',
                'deleted_at' => NULL,
                'created_at' => '2025-12-27 09:28:37',
                'updated_at' => '2025-12-29 05:41:26',
            ),
        ));
        
        
    }
}