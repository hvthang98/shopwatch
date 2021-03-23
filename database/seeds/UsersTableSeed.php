<?php

use Illuminate\Database\Seeder;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('email', 'admin@gmail.com')->get();
        if (count($user) <= 0) {
            $data = [
                [
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('123456'),
                    'name' => 'admin',
                    'birthday' => '1999-1-1',
                    'phone_number' => '0123456789',
                    'address' => 'Bình Định',
                    'roles_id' => 1,
                ]
            ];
            DB::table('users')->insert($data);
        }
    }
}
