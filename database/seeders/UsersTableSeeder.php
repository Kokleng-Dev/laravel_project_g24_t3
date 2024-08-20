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
                'name' => 'Developer',
                'username' => 'developer',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$lB370qKFiKDt5eyUYGKZge.28VK.DEnoRMtXWczTSf5FL8NC.LDXu',
                'photo' => 'images/photo/vmT3zGjBEqhg8CJwNMBwqzb1XsRVwUDFbbeFMTos.png',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2024-08-14 12:54:48',
                'updated_at' => '2024-08-14 12:54:48',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 2,
                'name' => 'Admin',
                'username' => 'admin',
                'email' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$12$XpkACM2E4AsOslyyfOH9OejensR5LLgVYT0sNBIcocOUQmZDm1n.y',
                'photo' => '/images/photo/no_pic.png',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2024-08-20 11:35:32',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 2,
                'name' => 'Admin 2',
                'username' => 'admin2',
                'email' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$12$ioM3y8ebq8Brg0cm9BfhCOOhkBXnnHFKXzp.1ePFYfrrNG4XYaWwC',
                'photo' => 'images/photo/fILlNhW4DeoEz5rGzddkgvZhXcHvyQeVjVJaWgB8.png',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2024-08-20 12:15:58',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}