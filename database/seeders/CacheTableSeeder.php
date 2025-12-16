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
                'key' => 'laravel-cache-03eea49fb83ced2657e9e0f045f31e96',
                'value' => 'i:1;',
                'expiration' => 1762923384,
            ),
            1 => 
            array (
                'key' => 'laravel-cache-03eea49fb83ced2657e9e0f045f31e96:timer',
                'value' => 'i:1762923384;',
                'expiration' => 1762923384,
            ),
            2 => 
            array (
                'key' => 'laravel-cache-7d5acdf8d39b41791db16e0786b19730',
                'value' => 'i:1;',
                'expiration' => 1762922075,
            ),
            3 => 
            array (
                'key' => 'laravel-cache-7d5acdf8d39b41791db16e0786b19730:timer',
                'value' => 'i:1762922075;',
                'expiration' => 1762922075,
            ),
            4 => 
            array (
                'key' => 'laravel-cache-admin@wanitbd.com|127.0.0.1',
                'value' => 'i:1;',
                'expiration' => 1762922075,
            ),
            5 => 
            array (
                'key' => 'laravel-cache-admin@wanitbd.com|127.0.0.1:timer',
                'value' => 'i:1762922075;',
                'expiration' => 1762922075,
            ),
        ));
        
        
    }
}