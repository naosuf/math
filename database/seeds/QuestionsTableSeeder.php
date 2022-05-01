<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert(
            [
            'title' => '多項式環',
            'body' => '次の多項式の既約性の証明が分かりません.',
            'user_id' => 1,
            'status' => 0,
        ]
        
        );
    }
}
