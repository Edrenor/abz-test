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
                'created_at' => new DateTime(),
            ],
            [
                'name' => 'second_position',
                'created_at' => new DateTime(),
            ],
            [
                'name' => 'third_position',
                'created_at' => new DateTime(),
            ],
            [
                'name' => 'fourth_position',
                'created_at' => new DateTime(),
            ],
            [
                'name' => 'fifth_position',
                'created_at' => new DateTime(),
            ],
        ]
        );
    }
}
