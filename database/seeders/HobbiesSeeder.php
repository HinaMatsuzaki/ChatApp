<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class HobbiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobbies')->insert([
                'name' => 'Baseball',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Bascketball',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Cafe-hopping',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Calligraphy',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Camping',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Cooking',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Dancing',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Drawing',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Driving',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Fishing',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Gaming',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Gardening',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Golf',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Hiking',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Knitting',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Lacrosse',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Movies',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Music',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Photography',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Programming',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Reading',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Rugby',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Singing',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Soccer',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Surfing',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Tennis',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Travelling',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Volleyball',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Volunteering',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('hobbies')->insert([
                'name' => 'Yoga',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
