<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolePermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_permissions')->delete();
        
        \DB::table('role_permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'permission_id' => 2,
                'list' => 1,
                'insert' => 1,
                'update' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 1,
                'permission_id' => 3,
                'list' => 1,
                'insert' => 1,
                'update' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 1,
                'permission_id' => 4,
                'list' => 1,
                'insert' => 1,
                'update' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 1,
                'permission_id' => 5,
                'list' => 1,
                'insert' => 1,
                'update' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'role_id' => 2,
                'permission_id' => 2,
                'list' => 1,
                'insert' => 1,
                'update' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'role_id' => 2,
                'permission_id' => 3,
                'list' => 1,
                'insert' => 1,
                'update' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'role_id' => 2,
                'permission_id' => 4,
                'list' => 1,
                'insert' => 1,
                'update' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'role_id' => 2,
                'permission_id' => 5,
                'list' => 1,
                'insert' => 1,
                'update' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'role_id' => 1,
                'permission_id' => 6,
                'list' => 1,
                'insert' => 0,
                'update' => 1,
                'delete' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'role_id' => 2,
                'permission_id' => 6,
                'list' => 1,
                'insert' => 0,
                'update' => 1,
                'delete' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'role_id' => 1,
                'permission_id' => 7,
                'list' => 1,
                'insert' => 1,
                'update' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'role_id' => 2,
                'permission_id' => 7,
                'list' => 1,
                'insert' => 1,
                'update' => 1,
                'delete' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}