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
            'tag' => 'Objects',
        ]);
        DB::table('tags')->insert([
            'tag' => 'Funciones',
        ]);
        DB::table('tags')->insert([
            'tag' => 'MVC',
        ]);
        DB::table('tags')->insert([
            'tag' => 'Scope',
        ]);
        DB::table('tags')->insert([
            'tag' => 'Queries',
        ]);
    }
}
