<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PurchaseItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('purchase_items')->delete();
        
        \DB::table('purchase_items')->insert(array (
            0 => 
            array (
                'id' => 7,
                'purchase_id' => 1,
                'product_id' => 1,
                'quantity' => 20,
                'price' => '145.00',
                'subtotal' => '2900.00',
                'created_at' => '2026-01-04 15:22:53',
                'updated_at' => '2026-01-04 15:22:53',
            ),
            1 => 
            array (
                'id' => 8,
                'purchase_id' => 1,
                'product_id' => 2,
                'quantity' => 25,
                'price' => '123.00',
                'subtotal' => '3075.00',
                'created_at' => '2026-01-04 15:22:53',
                'updated_at' => '2026-01-04 15:22:53',
            ),
            2 => 
            array (
                'id' => 9,
                'purchase_id' => 1,
                'product_id' => 3,
                'quantity' => 17,
                'price' => '520.00',
                'subtotal' => '8840.00',
                'created_at' => '2026-01-04 15:22:53',
                'updated_at' => '2026-01-04 15:22:53',
            ),
        ));
        
        
    }
}