<?php

use Illuminate\Database\Seeder;

class ModesTableSeeder extends Seeder
{
    /**
     * Populate the database with dummy data for testing.
     * Complete dummy data generation including relationships.
     * Set the property values as required before running database seeder.
     *
     */
    public function run()
    {
        DB::table('modes')->insert([
            [
                'title' => 'Night',
                'enabled' => true,
                'target_temperature' => 19,
                'period_start' => '22:30:00',
                'period_end' => '06:29:59',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'At work',
                'enabled' => true,
                'target_temperature' => 19,
                'period_start' => '09:30:00',
                'period_end' => '16:59:59',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'Weekend',
                'enabled' => true,
                'target_temperature' => 22,
                'period_start' => '07:30:00',
                'period_end' => '23:00:00',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'At home (morning)',
                'enabled' => true,
                'target_temperature' => 21,
                'period_start' => '06:30:00',
                'period_end' => '09:29:59',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'At home (evening)',
                'enabled' => true,
                'target_temperature' => 22,
                'period_start' => '17:00:00',
                'period_end' => '22:29:59',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
