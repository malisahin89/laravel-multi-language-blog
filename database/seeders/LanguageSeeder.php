<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('languages')->insert([
            [
                'id' => 1,
                'name' => 'Türkçe',
                'slug' => 'tr',
                'flag' => 'tr',
                'status' => 1,
                'is_default' => 1,
                'created_at' => Carbon::parse('2025-04-10 19:29:24'),
                'updated_at' => Carbon::parse('2025-05-01 15:20:13'),
            ],
            [
                'id' => 2,
                'name' => 'Русский',
                'slug' => 'ru',
                'flag' => 'ru',
                'status' => 1,
                'is_default' => 0,
                'created_at' => Carbon::parse('2025-04-09 18:56:14'),
                'updated_at' => Carbon::parse('2025-05-01 15:14:23'),
            ],
            [
                'id' => 3,
                'name' => 'English',
                'slug' => 'en',
                'flag' => 'gb',
                'status' => 1,
                'is_default' => 0,
                'created_at' => Carbon::parse('2025-04-09 18:56:24'),
                'updated_at' => Carbon::parse('2025-05-01 15:15:42'),
            ],
            [
                'id' => 4,
                'name' => 'Français',
                'slug' => 'fr',
                'flag' => 'fr',
                'status' => 1,
                'is_default' => 0,
                'created_at' => Carbon::parse('2025-04-09 18:57:38'),
                'updated_at' => Carbon::parse('2025-05-01 15:20:13'),
            ],
        ]);
    }
}
