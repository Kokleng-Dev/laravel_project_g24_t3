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
                'role_id' => 1,
                'name' => 'kokleng',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$lB370qKFiKDt5eyUYGKZge.28VK.DEnoRMtXWczTSf5FL8NC.LDXu',
                'remember_token' => NULL,
                'created_at' => '2024-08-14 12:54:48',
                'updated_at' => '2024-08-14 12:54:48',
            ),
        ));
        
        
    }
}