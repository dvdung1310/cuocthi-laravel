<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function checkLoginAndRedirect()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login')->with('error', 'Bạn cần đăng nhập trước.');
    }


    public function login(Request $request)
    {
        // Kiểm tra dữ liệu
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Đăng nhập người dùng
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công, chuyển hướng đến dashboard
            return redirect()->route('admin.dashboard');
        }

        // Đăng nhập không thành công, quay lại với thông báo lỗi
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }
}
