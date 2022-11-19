<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // User::truncate();

        $users =  [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Account Admin',
                'email' => 'accountadmin@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Project Admin',
                'email' => 'projectadmin@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'User 1',
                'email' => 'clientadmin@fpt.edu.vn',
                'password' => Hash::make('12345678'),
            ],            [
                'name' => 'User 2',
                'email' => 'clientadmin@fpt.edu.vn',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'User 3',
                'email' => 'clientadmin@fpt.edu.vn',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'User 4',
                'email' => 'clientadmin@fpt.edu.vn',
                'password' => Hash::make('12345678'),
            ]
        ];

        User::insert($users);
    }
}
