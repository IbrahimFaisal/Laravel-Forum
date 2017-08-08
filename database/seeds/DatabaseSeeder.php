<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(UserTableSeeder::class);
        $this->call(ChannelTableSeeder::class);
        $this->call(DiscussionTableSeeder::class);
        $this->call(ReplyTableSeeder::class);

    }
}
