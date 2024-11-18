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
            'email' => 'dungconmetheu@gmail.com',
            'password' => Hash::make('123'),  
        ]);

        User::create([
            'name' => 'Nguyễn Văn B',
            'email' => 'dung@gmail.com',
            'password' => Hash::make('123'),  
        ]);
    }
}
