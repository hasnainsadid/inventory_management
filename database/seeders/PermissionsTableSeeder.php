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
            18 => 
            array (
                'id' => 19,
                'name' => 'products.create',
                'guard_name' => 'web',
                'created_at' => '2026-01-06 10:10:40',
                'updated_at' => '2026-01-06 10:10:40',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'products.destroy',
                'guard_name' => 'web',
                'created_at' => '2026-01-06 10:10:40',
                'updated_at' => '2026-01-06 10:10:40',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'products.edit',
                'guard_name' => 'web',
                'created_at' => '2026-01-06 10:10:40',
                'updated_at' => '2026-01-06 10:10:40',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'products.index',
                'guard_name' => 'web',
                'created_at' => '2026-01-06 10:10:40',
                'updated_at' => '2026-01-06 10:10:40',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'purchases.create',
                'guard_name' => 'web',
                'created_at' => '2026-01-06 10:10:40',
                'updated_at' => '2026-01-06 10:10:40',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'purchases.destroy',
                'guard_name' => 'web',
                'created_at' => '2026-01-06 10:10:40',
                'updated_at' => '2026-01-06 10:10:40',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'purchases.edit',
                'guard_name' => 'web',
                'created_at' => '2026-01-06 10:10:40',
                'updated_at' => '2026-01-06 10:10:40',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'purchases.index',
                'guard_name' => 'web',
                'created_at' => '2026-01-06 10:10:40',
                'updated_at' => '2026-01-06 10:10:40',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'sales.create',
                'guard_name' => 'web',
                'created_at' => '2026-01-06 10:10:40',
                'updated_at' => '2026-01-06 10:10:40',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'sales.destroy',
                'guard_name' => 'web',
                'created_at' => '2026-01-06 10:10:40',
                'updated_at' => '2026-01-06 10:10:40',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'sales.edit',
                'guard_name' => 'web',
                'created_at' => '2026-01-06 10:10:40',
                'updated_at' => '2026-01-06 10:10:40',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'sales.index',
                'guard_name' => 'web',
                'created_at' => '2026-01-06 10:10:40',
                'updated_at' => '2026-01-06 10:10:40',
            ),
        ));
        
        
    }
}