<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function __construct(){
    
        
    }
    public function index(){
      // check login
      if(Auth::id() > 0){
        return redirect()->route('dashboard.index');
      }

        return view('backend.auth.login');
    }

    public function login(AuthRequest $request){
      // nhận dữ liệu form loginlogin
      $credentials = [
        'email' => $request -> input('email'),
        'password' => $request -> input('password'),
      ];
      if (Auth::attempt($credentials)) {
         return redirect()->route('dashboard.index')->with('success','Đăng nhập thành công.');
      }    
      return redirect()-> route('auth.admin') -> with('error','Email hoặc mật khẩu không chính xác.');
    }
    public function logout(Request $request) {
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect()->route('auth.admin');
    }
}