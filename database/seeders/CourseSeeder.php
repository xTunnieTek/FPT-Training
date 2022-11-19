<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Course::truncate();
        $courses = [
            [
                'coursename' => 'Introduction to Python',
                'description' => 'Learn the basics of Python, a powerful programming language used by sites like YouTube and Dropbox. In this course, you’ll learn how to use Python and work with data to explore information from the web and answer real-world questions. You’ll also write Python programs to collect and analyze data.',
                'images' => 'https://blogs.chapman.edu/wp-content/uploads/sites/28/2020/12/HyFlex-banner.jpg',
                'categoryid' => 1,
            ],
            [
                'coursename' => 'Introduction to Java',
                'description' => 'Learn the basics of Java, a powerful programming language used by sites like YouTube and Dropbox. In this course, you’ll learn how to use Java and work with data to explore information from the web and answer real-world questions. You’ll also write Java programs to collect and analyze data.',
                'images' => 'https://blogs.chapman.edu/wp-content/uploads/sites/28/2020/12/HyFlex-banner.jpg',
                'categoryid' => 1,
            ],
            [
                'coursename' => 'Design Thinking',
                'description' => 'Learn the basics of Design Thinking, a powerful programming language used by sites like YouTube and Dropbox. In this course, you’ll learn how to use Design Thinking and work with data to explore information from the web and answer real-world questions. You’ll also write Design Thinking programs to collect and analyze data.',
                'images' => 'https://blogs.chapman.edu/wp-content/uploads/sites/28/2020/12/HyFlex-banner.jpg',
                'categoryid' => 3,
            ],
            [
                'coursename' => 'Introduction to Business',
                'description' => 'Learn the basics of Business, a powerful programming language used by sites like YouTube and Dropbox. In this course, you’ll learn how to use Business and work with data to explore information from the web and answer real-world questions. You’ll also write Business programs to collect and analyze data.',
                'images' => 'https://blogs.chapman.edu/wp-content/uploads/sites/28/2020/12/HyFlex-banner.jpg',
                'categoryid' => 2,
            ],
            [
                'coursename' => 'Introduction to Marketing',
                'description' => 'Learn the basics of Marketing, a powerful programming language used by sites like YouTube and Dropbox. In this course, you’ll learn how to use Marketing and work with data to explore information from the web and answer real-world questions. You’ll also write Marketing programs to collect and analyze data.',
                'images' => 'https://blogs.chapman.edu/wp-content/uploads/sites/28/2020/12/HyFlex-banner.jpg',
                'categoryid' => 2,
            ],
            [
                'coursename' => 'Introduction to Finance',
                'description' => 'Learn the basics of Finance, a powerful programming language used by sites like YouTube and Dropbox. In this course, you’ll learn how to use Finance and work with data to explore information from the web and answer real-world questions. You’ll also write Finance programs to collect and analyze data.',
                'images' => 'https://blogs.chapman.edu/wp-content/uploads/sites/28/2020/12/HyFlex-banner.jpg',
                'categoryid' => 2,
            ],
        ];
        Course::insert($courses);
    }
}