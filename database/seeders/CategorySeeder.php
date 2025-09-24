<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Technology' => ['Software', 'Hardware', 'AI & Machine Learning'],
            'Health' => ['Nutrition', 'Fitness', 'Mental Health'],
            'Travel' => ['Adventure', 'Budget Travel', 'Luxury Travel'],
            'Education' => ['Online Courses', 'Schools', 'Tutorials'],
        ];

        foreach ($categories as $mainCategory => $subcategories) {
            // Insert main category
            $mainId = DB::table('categories')->insertGetId([
                'name' => $mainCategory,
                'slug' => Str::slug($mainCategory),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert subcategories
            foreach ($subcategories as $sub) {
                DB::table('subcategories')->insert([
                    'name' => $sub,
                    'slug' => Str::slug($sub),
                    'category_id' => $mainId, // subcategory points to parent
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
