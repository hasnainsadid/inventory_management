<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('purchases')->delete();
        
        \DB::table('purchases')->insert(array (
            0 => 
            array (
                'id' => 1,
                'supplier_id' => 2,
                'invoice_no' => 'PUR-1767504881',
                'purchase_date' => '2026-01-04',
                'total_amount' => '14815.00',
                'created_by' => 'Hasnain Sadid',
                'deleted_at' => NULL,
                'created_at' => '2026-01-04 11:56:00',
                'updated_at' => '2026-01-05 15:52:48',
            ),
        ));
        
        
    }
}