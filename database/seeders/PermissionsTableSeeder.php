<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'categories.create',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'categories.destroy',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'categories.edit',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'categories.index',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'contacts.destroy',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'contacts.index',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'roles.create',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'roles.destroy',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'roles.edit',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'roles.index',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'suppliers.create',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'suppliers.destroy',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'suppliers.edit',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'suppliers.index',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'users.create',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'users.destroy',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'users.edit',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'users.index',
                'guard_name' => 'web',
                'created_at' => '2025-12-29 10:29:26',
                'updated_at' => '2025-12-29 10:29:26',
            ),
        ));
        
        
    }
}