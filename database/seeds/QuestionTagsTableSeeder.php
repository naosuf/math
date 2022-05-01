<?php

use Illuminate\Database\Seeder;

class QuestionTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_tags')->insert([
            'question_id' => 5,
            'tag_id' => 5,
            ]);
    }
}
