<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;  // Đảm bảo bạn đã sử dụng đúng model User

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Tạo 2 người dùng
        User::create([
            'name' => 'Nguyễn Văn A',
            'email' => 'usera@example.com',
            'password' => Hash::make('password123'),  
        ]);

        User::create([
            'name' => 'Nguyễn Văn B',
            'email' => 'userb@example.com',
            'password' => Hash::make('password123'),  
        ]);
    }
}
