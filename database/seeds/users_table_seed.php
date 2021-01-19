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
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'name' => 'admin',
                'birthday' => '1999-1-1',
                'phone_number' => '0123456789',
                'address' => 'Bình Định',
                'level' => 1
            ]
        ];
        DB::table('users')->insert($data);
    }
}
