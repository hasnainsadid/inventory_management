<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suppliers')->delete();
        
        \DB::table('suppliers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Hasnain Sadid',
                'email' => 'sadid@wanitbd.com',
                'phone' => '01798537135',
                'address' => '69 Shahid Sangbadik Selina Parveen Road, Moghbazar',
                'deleted_at' => NULL,
                'created_at' => '2025-12-29 05:31:25',
                'updated_at' => '2025-12-29 05:31:25',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Shafayet Hasan',
                'email' => 'hasan@hotmail.com',
                'phone' => '01524879970',
                'address' => 'Dhaka, Bangladesh',
                'deleted_at' => NULL,
                'created_at' => '2025-12-29 05:32:14',
                'updated_at' => '2025-12-29 05:34:37',
            ),
        ));
        
        
    }
}