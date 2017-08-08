<?php

use Illuminate\Database\Seeder;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Reply::create([

            'user_id' => 1,
            'discussion_id' => 5,
            'body' => 'This handy tool helps you create dummy text for all your layout needs.',

        ]);


        \App\Reply::create([

            'user_id' => 2,
            'discussion_id' => 6,
            'body' => 'We are gradually adding new functionality and we welcome your suggestions and feedback.',

        ]);


        \App\Reply::create([

            'user_id' => 3,
            'discussion_id' => 7,
            'body' => 'Please feel free to send us any additional dummy texts.',

        ]);


        \App\Reply::create([

            'user_id' => 2,
            'discussion_id' => 1,
            'body' => 'Many thanks to: Nicolai of textformer Eric of Richytype and Peewee',

        ]);


        \App\Reply::create([

            'user_id' => 3,
            'discussion_id' => 2,
            'body' => 'Adding placeholder text can help you to mock up your layouts and can help your clients envision the work-in-progress. You can easily replace it with the actual copy later.',

        ]);


        \App\Reply::create([

            'user_id' => 1,
            'discussion_id' => 3,
            'body' => 'Create or select a text frame; make sure it is active with an insertion point in the frame.',

        ]);


        \App\Reply::create([

            'user_id' => 2,
            'discussion_id' => 4,
            'body' => 'You can also add placeholder text to threaded, or linked frames.',

        ]);


        \App\Reply::create([

            'user_id' => 3,
            'discussion_id' => 2,
            'body' => 'One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.',

        ]);


        \App\Reply::create([

            'user_id' => 2,
            'discussion_id' => 8,
            'body' => 'I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems.',

        ]);


        \App\Reply::create([

            'user_id' => 1,
            'discussion_id' => 9,
            'body' => ' A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.',

        ]);

    }
}
