<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendVeryEmail;
use Illuminate\Support\Str;

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
            if(auth()->user()->email_verified_at == null){
                Auth::logout();
                return redirect()->back()->with('error', 'Vui lòng xác nhận email trước khi đăng nhập.');
            }
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
            $user->assignRole('customer');  

            //tạo token xác thực mail 
            $token = Str::random(64);
            $user->very_mail_token = $token;
            $user->save();

            //gửi mail xác thực
            SendVeryEmail::dispatch($user->email, $user->name, $user->very_mail_token);


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



    public function veryEmail($token)
    {
        $user = User::where('very_mail_token', $token)->first();

        if (!$user) {
            return redirect()->route('home.index')->with('error', 'Liên kết xác nhận không hợp lệ hoặc đã hết hạn.');
        }

        $user->email_verified_at = now();
        $user->very_mail_token = null;
        $user->save();

        return redirect()->route('auth.login.index')->with('success', 'Xác nhận email thành công. Vui lòng đăng nhập.');
    }
}
