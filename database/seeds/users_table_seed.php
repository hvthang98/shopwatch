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
                'email'=>'thang@gmail.com',
                'password'=>bcrypt('123456'),
                'name'=>'thang',
                'birthday'=>'1999-5-11',
                'phone_number'=>'12345678',
                'address'=>'Quang Ngai',
                'level'=>0
            ]
        ];
        DB::table('users')->insert($data);
    }
}
