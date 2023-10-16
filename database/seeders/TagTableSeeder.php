<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Tag::create([
            'name' => 'Phan Văn Tuấn'
        ]);
        Tag::create([
            'name' => 'FullStack8'
        ]);
        Tag::create([
            'name' => 'Laravel'
        ]);

    }
}
