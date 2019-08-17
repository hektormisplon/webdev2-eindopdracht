<?php

use App\Category;
use Illuminate\Database\Seeder;

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
            [
                'name' => 'technology',
            ],
            [
                'name' => 'marketing',
            ],
            [
                'name' => 'design',
            ]
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
