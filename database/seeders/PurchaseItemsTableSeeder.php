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
                'id' => 1,
                'purchase_id' => 1,
                'product_id' => 1,
                'quantity' => 15,
                'price' => '145.00',
                'subtotal' => '2175.00',
                'created_at' => '2026-01-04 11:56:00',
                'updated_at' => '2026-01-04 11:56:00',
            ),
            1 => 
            array (
                'id' => 2,
                'purchase_id' => 1,
                'product_id' => 2,
                'quantity' => 25,
                'price' => '123.00',
                'subtotal' => '3075.00',
                'created_at' => '2026-01-04 11:56:00',
                'updated_at' => '2026-01-04 11:56:00',
            ),
            2 => 
            array (
                'id' => 3,
                'purchase_id' => 1,
                'product_id' => 3,
                'quantity' => 12,
                'price' => '520.00',
                'subtotal' => '6240.00',
                'created_at' => '2026-01-04 11:56:00',
                'updated_at' => '2026-01-04 11:56:00',
            ),
        ));
        
        
    }
}