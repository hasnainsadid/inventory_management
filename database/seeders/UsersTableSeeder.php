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
                'phone' => '01798537137',
                'address' => '69 Shahid Sangbadik Selina Parveen Road, Moghbazar',
                'email_verified_at' => NULL,
                'password' => '$2y$12$fNcRDbAhGTSFM.ttUkRG5.5VSG2cd2p2SmDt.hSt1NZALdKXAjk/u',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'l1yOPNLW6nS8lu4KXssKe4ctfqSlGXzPJhAQGaB3DOXT3vsYb7Ob8KYEPti5',
                'current_team_id' => NULL,
                'profile_photo_path' => 'profile-photos/X1z5BuEaQQHQhhunM6iwazlLS0QA4Bo11e6JjV3T.jpg',
                'created_at' => '2025-11-11 10:38:04',
                'updated_at' => '2025-12-28 09:36:23',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Khairul Islam Emon',
                'email' => 'emon@wanitbd.com',
                'phone' => '01621534578',
                'address' => '69 Shahid Sangbadik Selina Parveen Road, Moghbazar',
                'email_verified_at' => NULL,
                'password' => '$2y$12$RhRh.TTUdWu2gLTlhl4FT.Tw8EBr.snyI9QsD4uP8IRZ/mIyKodBO',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => '5r943QVQyu8Qyb3UKTAfKCa5mclnskGm08XAlUJLLLpwrlejyjMTBsLImaWj',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2025-12-28 09:15:13',
                'updated_at' => '2025-12-28 09:50:49',
            ),
        ));
        
        
    }
}