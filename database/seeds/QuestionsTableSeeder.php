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
        DB::table('questions')->insert([
            [
                'title' => '多項式環',
                'body' => '次の多項式の既約性の証明が分かりません.',
                'user_id' => 1,
                'status' => 0,
                ],
                
            [
                'title' => '多項式環2',
                'body' => '次の多項式の因数分解が分かりません.',
                'user_id' => 2,
                'status' => 1,
            ],
            [
                'title' => '微積分１',
                'body' => '次の広義積分がわかりません.',
                'user_id' => 3,
                'status' => 0,
            ],
            [
                'title' => '微積2',
                'body' => '次の広義積分がわかりません.',
                'user_id' => 1,
                'status' => 0,
            ],
            [
                'title' => '微積分3',
                'body' => '次の広義積分がわかりません.',
                'user_id' => 4,
                'status' => 1,
            ],
        
        
        ]);
    }
}
