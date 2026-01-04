<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 1,
                'name' => 'Renee Schultz',
                'slug' => 'renee-schultz',
                'sku' => 'Abc-2545686',
                'image' => 'product/renee-schultz_1767518727.png',
                'unit' => 'Kg',
                'purchase_price' => '145',
                'sale_price' => '250',
                'alert_quantity' => '5',
                'created_at' => '2026-01-03 10:56:16',
                'updated_at' => '2026-01-04 15:25:27',
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 1,
                'name' => 'Della',
                'slug' => 'della',
                'sku' => 'BTZ078459',
                'image' => 'product/della_1767518741.png',
                'unit' => 'Kg',
                'purchase_price' => '123',
                'sale_price' => '250',
                'alert_quantity' => '5',
                'created_at' => '2026-01-03 10:59:52',
                'updated_at' => '2026-01-04 15:25:41',
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 1,
                'name' => 'Tatum Faulkner',
                'slug' => 'tatum-faulkner',
                'sku' => 'BTZ0784591',
                'image' => 'product/image_1767438299_6958f7db82746.png',
                'unit' => 'Kg',
                'purchase_price' => '520',
                'sale_price' => '850',
                'alert_quantity' => '5',
                'created_at' => '2026-01-03 11:04:59',
                'updated_at' => '2026-01-03 11:04:59',
            ),
        ));
        
        
    }
}