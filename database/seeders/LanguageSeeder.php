<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
                'name' => 'English',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('languages')->insert([
                'name' => '日本語',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('languages')->insert([
                'name' => '简体中文',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('languages')->insert([
                'name' => 'Español',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('languages')->insert([
                'name' => 'Français',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('languages')->insert([
                'name' => 'Deutsch',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('languages')->insert([
                'name' => 'Pусский',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('languages')->insert([
                'name' => 'Português',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('languages')->insert([
                'name' => 'Italiano',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('languages')->insert([
                'name' => '한국어',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('languages')->insert([
                'name' => 'Türkçe',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('languages')->insert([
                'name' => 'Nederlands',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('languages')->insert([
                'name' => 'Polski',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
