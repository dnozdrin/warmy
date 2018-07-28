<?php

use Illuminate\Database\Seeder;

class ModesDaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modes_days')->insert([
            // Night
            ['mode_id' => 1,'day_identifier' => 1,],
            ['mode_id' => 1,'day_identifier' => 2,],
            ['mode_id' => 1,'day_identifier' => 3,],
            ['mode_id' => 1,'day_identifier' => 4,],
            ['mode_id' => 1,'day_identifier' => 5,],
            ['mode_id' => 1,'day_identifier' => 6,],
            ['mode_id' => 1,'day_identifier' => 7,],
            // At work
            ['mode_id' => 2,'day_identifier' => 1,],
            ['mode_id' => 2,'day_identifier' => 2,],
            ['mode_id' => 2,'day_identifier' => 3,],
            ['mode_id' => 2,'day_identifier' => 4,],
            ['mode_id' => 2,'day_identifier' => 5,],
            // Weekend
            ['mode_id' => 3,'day_identifier' => 6,],
            ['mode_id' => 3,'day_identifier' => 7,],
            // At home (morning)
            ['mode_id' => 4,'day_identifier' => 1,],
            ['mode_id' => 4,'day_identifier' => 2,],
            ['mode_id' => 4,'day_identifier' => 3,],
            ['mode_id' => 4,'day_identifier' => 4,],
            ['mode_id' => 4,'day_identifier' => 5,],
            // At home (evening)
            ['mode_id' => 5,'day_identifier' => 1,],
            ['mode_id' => 5,'day_identifier' => 2,],
            ['mode_id' => 5,'day_identifier' => 3,],
            ['mode_id' => 5,'day_identifier' => 4,],
            ['mode_id' => 5,'day_identifier' => 5,],
        ]);
    }
}
