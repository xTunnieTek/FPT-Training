<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = [
            [
                'name' => 'Admin',
                'email' => 'admin@fpt.edu.vn',
                'password' => Hash::make('amin123@123'),
                'role' => 'admin',
            ],
        ];
        User::insert($admin);
    }
}
