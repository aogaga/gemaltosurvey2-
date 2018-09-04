<?php

use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
            'answer' => str_random(50),
            'visitorIp' => '192.168.0.26'

        ]);
    }
}
