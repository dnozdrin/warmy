<?php

use Illuminate\Database\Seeder;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([
            ['identifier' => 1,],
            ['identifier' => 2,],
            ['identifier' => 3,],
            ['identifier' => 4,],
            ['identifier' => 5,],
            ['identifier' => 6,],
            ['identifier' => 7,],
        ]);
    }
}
