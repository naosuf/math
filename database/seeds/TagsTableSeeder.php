<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'name' => '線形代数'
            ],
            [
                'name' => '群論'
            ],
            [
                'name' => '環論'
            ],
            [
                'name' => '体論'
            ],
            [
                'name' => '位相幾何学'
            ],
            [
                'name' => '多様体'
            ],
            [
                'name' => '位相空間論'
            ],
            [
                'name' => '複素解析'
            ],
        
        ]);
    }
}
