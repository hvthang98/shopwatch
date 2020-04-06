<?php

use Illuminate\Database\Seeder;

class users_table_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'email'=>'vinh123@gmail.com',
                'password'=>bcrypt('123456'),
                'name'=>'vinh123',
                'username'=>'admin',
                'birthday'=>'1999-5-11',
                'phone_number'=>'12345678',
                'address'=>'Quang Ngai',
                
            ]
        ];
        DB::table('users')->insert($data);
    }
}
