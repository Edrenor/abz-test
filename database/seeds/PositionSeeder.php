<?php

use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{

    /**
     * @throws Exception
     */
    public function run()
    {
        DB::table('positions')->insert([
            [
                'name' => 'first_position',
                'level' => 10,
                'created_at' => new DateTime(),
            ],
            [
                'name' => 'second_position',
                'level' => 20,
                'created_at' => new DateTime(),
            ],
            [
                'name' => 'third_position',
                'level' => 30,
                'created_at' => new DateTime(),
            ],
            [
                'name' => 'fourth_position',
                'level' => 40,
                'created_at' => new DateTime(),
            ],
            [
                'name' => 'fifth_position',
                'level' => 50,
                'created_at' => new DateTime(),
            ],
        ]
        );
    }
}
