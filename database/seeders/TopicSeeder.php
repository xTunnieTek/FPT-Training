<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $topics = [
            [
                'courseid' => 1,
                'title' => 'Introduction',
                'link' => 'https://www.youtube.com/watch?v=1Q8fG0TtVAY',
                'about' => 'Introduction',
            ],
            [
                'courseid' => 1,
                'title' => 'What is Laravel',
                'link' => 'https://www.youtube.com/watch?v=1Q8fG0TtVAY',
                'about' => 'What is Laravel',
            ],
            [
                'courseid' => 1,
                'title' => 'Laravel Installation',
                'link' => 'https://www.youtube.com/watch?v=1Q8fG0TtVAY',
                'about' => 'Laravel Installation',
            ],
            [
                'courseid' => 1,
                'title' => 'Laravel Project Structure',
                'link' => 'https://www.youtube.com/watch?v=1Q8fG0TtVAY',
                'about' => 'Laravel Project Structure',
            ],
            [
                'courseid' => 1,
                'title' => 'Laravel Routing',
                'link' => 'https://www.youtube.com/watch?v=1Q8fG0TtVAY',
                'about' => 'Laravel Routing',
            ],
            [
                'courseid' => 1,
                'title' => 'Laravel Controllers',
                'link' => 'https://www.youtube.com/watch?v=1Q8fG0TtVAY',
                'about' => 'Laravel Controllers',
            ],
            [
                'courseid' => 1,
                'title' => 'Laravel Views',
                'link' => 'https://www.youtube.com/watch?v=1Q8fG0TtVAY',
                'about' => 'Laravel Views',
            ],
            [
                'courseid' => 1,
                'title' => 'Laravel Blade Template Engine',
                'link' => 'https://www.youtube.com/watch?v=1Q8fG0TtVAY',
                'about' => 'Laravel Blade Template Engine',
            ],
            [
                'courseid' => 1,
                'title' => 'Laravel Database',
                'link' => 'https://www.youtube.com/watch?v=1Q8fG0TtVAY',
                'about' => 'Laravel Database',
            ],
            [
                'courseid' => 2,
                'title' => 'JavaScript Introduction',
                'link' => 'https://www.youtube.com/watch?v=1Q8fG0TtVAY',
                'about' => 'JavaScript Introduction',
            ],
            [
                'courseid' => 2,
                'title' => 'JavaScript Variables',
                'link' => 'https://www.youtube.com/watch?v=1Q8fG0TtVAY',
                'about' => 'JavaScript Variables',
            ],
            [
                'courseid' => 3,
                'title' => 'PHP Introduction',
                'link' => 'https://www.youtube.com/watch?v=1Q8fG0TtVAY',
                'about' => 'PHP Introduction',
            ]
        ];
        Topic::insert($topics);
    }
}
