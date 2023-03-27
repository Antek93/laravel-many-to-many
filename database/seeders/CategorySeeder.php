<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Models
use App\Models\Category;
//Helpers
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Presentazione',
            'Collaboratori',
            'Estratto',
            'Ringraziamenti',
            'Off Topic',
        ];

        foreach ($categories as $category) {
            $newCategory = Category::create([
                'name' => $category,
                'slug' => Str::slug($category)
            ]);
        }
    }
}
