<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        if (auth()->check()){
            return redirect()->route('index.adminPanel')->with('error', 'شما قبلا وارد سایت شده اید');
        }else{
            return view('admin-panel.pages.auth.login');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
//        dd(Hash::check($request->password, $user->password));
//        dd($request->Password, $user->password);
        if (!Hash::check($request->password, $user->password)){
            return redirect()->back()->with('error', 'ایمیل یا پسوورد شما صحیح نمی باشد');
        }



        if (!$user){
            return redirect()->back()->with('error', 'ایمیل یا پسوورد شما صحیح نمی باشد');
        }else{
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('index.adminPanel')->with('success', 'به پنل ادمین خوش امدید');
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('post.login');
    }
}
