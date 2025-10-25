<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(Request $request)
    {
        return view('client.page.auth.login');
    }

    public function loginPost(Request $request)
    {
        // dd($request->all());
            $payload = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ],[
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Định dạng email không hợp lệ',
          'password.required' => 'Vui lòng nhập mật khẩu',    
        ]);

        if (auth()->attempt($payload)) {
            return redirect()->route('home.index')->with('success', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->with('error', 'Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin.');
        }
    }
    function register(Request $request)
    {
        return view('client.page.auth.register');
    }

    public function registerPost(RegisterRequest $request)
    {
        try{
        
            $user=User::create($request->all());
            $user->assignRole('customer'); //anh gán role customer cho user moi dang ky, nhưng trong database không có
            return redirect()->route('auth.login.index')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đăng ký không thành công. Vui lòng thử lại.');
        }
    }

    function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('auth.login.index')->with('success', 'Đăng xuất thành công.');
    }
}
