<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductStocksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_stocks')->delete();
        
        \DB::table('product_stocks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_id' => 1,
                'stock' => 11,
                'created_at' => '2026-01-04 15:22:17',
                'updated_at' => '2026-01-05 00:00:16',
            ),
            1 => 
            array (
                'id' => 2,
                'product_id' => 2,
                'stock' => 25,
                'created_at' => '2026-01-04 15:22:17',
                'updated_at' => '2026-01-04 15:22:53',
            ),
            2 => 
            array (
                'id' => 3,
                'product_id' => 3,
                'stock' => 17,
                'created_at' => '2026-01-04 15:22:17',
                'updated_at' => '2026-01-04 15:22:53',
            ),
        ));
        
        
    }
}