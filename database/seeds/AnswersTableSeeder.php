<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert(
            [
            'body' => 'こんな感じで解きます.',
            'user_id' => 3,
            'question_id' => 3,
        ]
        );
    }
}
