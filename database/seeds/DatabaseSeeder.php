<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            AnswersTableSeeder::class,
            QuestionTagsTableSeeder::class,
            QuestionsTableSeeder::class,
            CommentsTableSeeder::class,
            NotesTableSeeder::class,
            TagsTableSeeder::class,
            
            
            
        ]);
    }
}
