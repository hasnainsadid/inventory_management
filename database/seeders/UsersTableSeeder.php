<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Hasnain Sadid',
                'email' => 'admin@wanitbd.com',
                'phone' => '01798537135',
                'address' => '69 Shahid Sangbadik Selina Parveen Road, Moghbazar',
                'email_verified_at' => NULL,
                'password' => '$2y$12$dqNcyFUgJJ3qf8gx0IQ/0up1sLFN1RKCDeeIQFv9mQc2a3e9n6JlK',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'broLdmxYXkf43oavFIh6x8yBdQKC8S4U9g5UoVfTJKeylMLAPJvpwJfjil38',
                'current_team_id' => NULL,
                'profile_photo_path' => 'profile-photos/BtJxYTRlQSI311y8RFtprB8UhUuepUF5dCKylway.jpg',
                'created_at' => '2025-11-08 09:05:43',
                'updated_at' => '2025-11-11 09:03:46',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Hasnain Sadid',
                'email' => 'sadid@wanitbd.com',
                'phone' => '01798537135',
                'address' => '69 Shahid Sangbadik Selina Parveen Road, Moghbazar',
                'email_verified_at' => NULL,
                'password' => '$2y$12$PzLgIhT2Td3Xi5KoZIfEu.cknfqWrcEpfTBtjf5lfwNL/JaKy0h7a',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'EGsERmen62aQ2JPDGjrivRwAImu4PH4vLiRwFzw9IRKSm3W77hcrXp9WE17v',
                'current_team_id' => NULL,
                'profile_photo_path' => 'profile-photos/X1z5BuEaQQHQhhunM6iwazlLS0QA4Bo11e6JjV3T.jpg',
                'created_at' => '2025-11-11 10:38:04',
                'updated_at' => '2025-11-12 04:55:15',
            ),
        ));
        
        
    }
}