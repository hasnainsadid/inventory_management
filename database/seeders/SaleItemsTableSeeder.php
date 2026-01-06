<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SaleItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sale_items')->delete();
        
        \DB::table('sale_items')->insert(array (
            0 => 
            array (
                'id' => 2,
                'sale_id' => 2,
                'product_id' => 1,
                'quantity' => 9,
                'price' => '250.00',
                'subtotal' => '2250.00',
                'deleted_at' => NULL,
                'created_at' => '2026-01-05 00:00:16',
                'updated_at' => '2026-01-05 00:00:16',
            ),
        ));
        
        
    }
}