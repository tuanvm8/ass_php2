<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            ['name'=>'tuan',
                'email' => 'tuan123@gmail.com',
                'password' => bcrypt('12345678'),

                'avatar'=>'vcgfb',
                'role'=>1,
                'address'=>'bacgiang'],
            [
                'name'=>'tuan1',
                'email' => 'adminn@gmail.com',
                'password' => bcrypt('12345678'),

                'avatar'=>'asdsa',
                'role'=>1,
                'address'=>'bacgiang'

            ]

        ];

        DB::table('users')->insert($data);

    }
}
