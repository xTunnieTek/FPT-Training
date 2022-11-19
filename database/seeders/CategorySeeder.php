<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::truncate();
        $categories = [
            [
                'categoryname' => 'Information Technology',
                'description' => 'Master your language with lessons, quizzes, and projects designed for real-life scenarios. Create portfolio projects that showcase your new skills to help land your dream job.',
                'images' => 'https://blogs.chapman.edu/wp-content/uploads/sites/28/2020/12/HyFlex-banner.jpg',
            ],
            [
                'categoryname' => 'Business',
                'description' => 'Learn the skills you need to succeed in business. From marketing and sales to finance and operations, our business courses will help you gain the confidence you need to take your career to the next level.',
                'images' => 'https://blogs.chapman.edu/wp-content/uploads/sites/28/2020/12/HyFlex-banner.jpg',
            ],
            [
                'categoryname' => 'Design',
                'description' => 'Learn the skills you need to succeed in business. From marketing and sales to finance and operations, our business courses will help you gain the confidence you need to take your career to the next level.',
                'images' => 'https://blogs.chapman.edu/wp-content/uploads/sites/28/2020/12/HyFlex-banner.jpg',
            ],
        ];

        Category::insert($categories);
    }
}
