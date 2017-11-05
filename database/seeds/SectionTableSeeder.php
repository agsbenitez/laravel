<?php

use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            'section' => 'PHP',
        ]);
        DB::table('sections')->insert([
            'section' => 'JS',
        ]);
        DB::table('sections')->insert([
            'section' => 'CSS',
        ]);
    }
}
