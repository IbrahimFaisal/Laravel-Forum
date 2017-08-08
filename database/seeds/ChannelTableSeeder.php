<?php

use Illuminate\Database\Seeder;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Channel::create([

            'name' => 'Laravel',
            'slug' => str_slug('Laravel'),

        ]);

        \App\Channel::create([

            'name' => 'WordPress',
            'slug' => str_slug('WordPress'),

        ]);

        \App\Channel::create([

            'name' => 'Ruby on rails',
            'slug' => str_slug('Ruby on rails'),

        ]);

        \App\Channel::create([

            'name' => 'Android',
            'slug' => str_slug('Android'),

        ]);

        \App\Channel::create([

            'name' => 'JavaScript',
            'slug' => str_slug('JavaScript'),

        ]);

    }
}
