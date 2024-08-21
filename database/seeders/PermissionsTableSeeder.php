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
                'id' => 2,
                'name' => 'Product Category',
                'alias' => 'product_category',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Product',
                'alias' => 'product',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Role',
                'alias' => 'role',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'User',
                'alias' => 'user',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Company',
                'alias' => 'company',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Banner',
                'alias' => 'banner',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}