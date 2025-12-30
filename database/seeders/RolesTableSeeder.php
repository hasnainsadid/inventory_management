<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Super Admin',
                'guard_name' => 'web',
                'created_at' => '2025-12-27 09:08:52',
                'updated_at' => '2025-12-27 09:08:52',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Admin',
                'guard_name' => 'web',
                'created_at' => '2025-12-27 09:14:35',
                'updated_at' => '2025-12-27 09:14:35',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Manager',
                'guard_name' => 'web',
                'created_at' => '2025-12-27 09:14:51',
                'updated_at' => '2025-12-27 09:14:51',
            ),
        ));
        
        
    }
}