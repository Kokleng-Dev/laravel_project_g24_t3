<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('companies')->delete();
        
        \DB::table('companies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Online Shop',
                'phone' => '90029349234',
                'address' => NULL,
                'email' => 'admin@gmail.com',
                'photo' => 'images/company/p81U077BNxUfdz3vdupKi8e4HabY1qfW1DBgfNIT.svg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}