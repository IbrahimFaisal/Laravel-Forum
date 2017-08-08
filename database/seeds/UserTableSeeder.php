<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\User::create([

            'name' => 'faisal khan',
            'email' => 'faisal@yahoo.com',
            'password' => bcrypt(123456),
            'avatar' => asset('images/user.png'),
            'admin' => 1,

        ]);


        \App\User::create([

            'name' => 'saad',
            'email' => 'saad@yahoo.com',
            'password' => bcrypt('123456'),
            'avatar' => asset('images/user_1.png'),

        ]);


        \App\User::create([

            'name' => 'talha',
            'email' => 'talha@yahoo.com',
            'password' => bcrypt('talha123456'),
            'avatar' => asset('images/user_2.png'),

        ]);

    }
}
