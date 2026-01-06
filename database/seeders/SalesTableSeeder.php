<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sales')->delete();
        
        \DB::table('sales')->insert(array (
            0 => 
            array (
                'id' => 2,
                'invoice_no' => 'PUR-1767544178',
                'sale_date' => '2026-01-04',
                'customer_name' => 'Hasnain Fayez',
                'total_amount' => '2250.00',
                'created_by' => 'Hasnain Sadid',
                'deleted_at' => NULL,
                'created_at' => '2026-01-04 22:29:50',
                'updated_at' => '2026-01-05 00:00:16',
            ),
        ));
        
        
    }
}