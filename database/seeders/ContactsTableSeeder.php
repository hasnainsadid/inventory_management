<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contacts')->delete();
        
        \DB::table('contacts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Imrul Hasan',
                'email' => 'imrul@wanitbd.com',
                'subject' => 'Demo Subject',
                'message' => 'this is a demo message for testing',
                'deleted_at' => NULL,
                'created_at' => '2025-12-29 15:00:18',
                'updated_at' => '2025-12-29 15:00:18',
            ),
        ));
        
        
    }
}