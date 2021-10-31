<?php

use Illuminate\Database\Seeder;

class RolesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id'            => 1,
            'name'          => 'admin',
            'description'   => 'admin',
        ]);

        DB::table('roles')->insert([
            'id'            => 2,
            'name'          => 'customer',
            'description'   => 'customer',
        ]);
    }
}
