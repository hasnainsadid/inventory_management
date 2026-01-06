<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CacheTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cache')->delete();
        
        \DB::table('cache')->insert(array (
            0 => 
            array (
                'key' => 'laravel-cache-spatie.permission.cache',
                'value' => 'a:3:{s:5:"alias";a:4:{s:1:"a";s:2:"id";s:1:"b";s:4:"name";s:1:"c";s:10:"guard_name";s:1:"r";s:5:"roles";}s:11:"permissions";a:30:{i:0;a:4:{s:1:"a";i:1;s:1:"b";s:17:"categories.create";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:2;}}i:1;a:4:{s:1:"a";i:2;s:1:"b";s:18:"categories.destroy";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:2;i:1;i:3;}}i:2;a:4:{s:1:"a";i:3;s:1:"b";s:15:"categories.edit";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:2;}}i:3;a:4:{s:1:"a";i:4;s:1:"b";s:16:"categories.index";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:2;i:1;i:3;}}i:4;a:3:{s:1:"a";i:5;s:1:"b";s:16:"contacts.destroy";s:1:"c";s:3:"web";}i:5;a:4:{s:1:"a";i:6;s:1:"b";s:14:"contacts.index";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:2;i:1;i:3;}}i:6;a:4:{s:1:"a";i:7;s:1:"b";s:12:"roles.create";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:2;}}i:7;a:3:{s:1:"a";i:8;s:1:"b";s:13:"roles.destroy";s:1:"c";s:3:"web";}i:8;a:4:{s:1:"a";i:9;s:1:"b";s:10:"roles.edit";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:2;}}i:9;a:4:{s:1:"a";i:10;s:1:"b";s:11:"roles.index";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:2;}}i:10;a:4:{s:1:"a";i:11;s:1:"b";s:16:"suppliers.create";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:2;i:1;i:3;}}i:11;a:4:{s:1:"a";i:12;s:1:"b";s:17:"suppliers.destroy";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:2;}}i:12;a:4:{s:1:"a";i:13;s:1:"b";s:14:"suppliers.edit";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:2;i:1;i:3;}}i:13;a:4:{s:1:"a";i:14;s:1:"b";s:15:"suppliers.index";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:2;i:1;i:3;}}i:14;a:4:{s:1:"a";i:15;s:1:"b";s:12:"users.create";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:3;}}i:15;a:3:{s:1:"a";i:16;s:1:"b";s:13:"users.destroy";s:1:"c";s:3:"web";}i:16;a:3:{s:1:"a";i:17;s:1:"b";s:10:"users.edit";s:1:"c";s:3:"web";}i:17;a:4:{s:1:"a";i:18;s:1:"b";s:11:"users.index";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:3;}}i:18;a:3:{s:1:"a";i:19;s:1:"b";s:15:"products.create";s:1:"c";s:3:"web";}i:19;a:3:{s:1:"a";i:20;s:1:"b";s:16:"products.destroy";s:1:"c";s:3:"web";}i:20;a:3:{s:1:"a";i:21;s:1:"b";s:13:"products.edit";s:1:"c";s:3:"web";}i:21;a:3:{s:1:"a";i:22;s:1:"b";s:14:"products.index";s:1:"c";s:3:"web";}i:22;a:3:{s:1:"a";i:23;s:1:"b";s:16:"purchases.create";s:1:"c";s:3:"web";}i:23;a:3:{s:1:"a";i:24;s:1:"b";s:17:"purchases.destroy";s:1:"c";s:3:"web";}i:24;a:3:{s:1:"a";i:25;s:1:"b";s:14:"purchases.edit";s:1:"c";s:3:"web";}i:25;a:3:{s:1:"a";i:26;s:1:"b";s:15:"purchases.index";s:1:"c";s:3:"web";}i:26;a:3:{s:1:"a";i:27;s:1:"b";s:12:"sales.create";s:1:"c";s:3:"web";}i:27;a:3:{s:1:"a";i:28;s:1:"b";s:13:"sales.destroy";s:1:"c";s:3:"web";}i:28;a:3:{s:1:"a";i:29;s:1:"b";s:10:"sales.edit";s:1:"c";s:3:"web";}i:29;a:3:{s:1:"a";i:30;s:1:"b";s:11:"sales.index";s:1:"c";s:3:"web";}}s:5:"roles";a:2:{i:0;a:3:{s:1:"a";i:2;s:1:"b";s:5:"Admin";s:1:"c";s:3:"web";}i:1;a:3:{s:1:"a";i:3;s:1:"b";s:7:"Manager";s:1:"c";s:3:"web";}}}',
                'expiration' => 1767759040,
            ),
        ));
        
        
    }
}