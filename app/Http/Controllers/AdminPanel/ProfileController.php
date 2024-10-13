<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function profile($id )
    {
        $user = User::where('id', $id)->find($id);
        if (auth()->check()){
            if (auth()->user()->id == $id){
                return view('admin-panel.pages.profile.profile', compact('user'));
            }else{
                abort(404);
            }
        }else{
            return redirect()->route('login')->with('error', 'ابتدا باید وارد سایت شوید');
        }

    }

    public function createProfile($id)
    {
        $user = User::where('id', $id)->find($id);
        if (auth()->user()->id == $id){
            return view('admin-panel.pages.profile.create', compact('user'));
        }else{
            abort(404);
        }
    }

    public function storeProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:12|confirmed',
        ]);

//        dd($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (!$user){
            return redirect()->back()->with('error', 'ثبت نام شما با مشکل مواجه شد لطفا مجدد تلاش کنید.');
        }else{
            return redirect()->route('profile', ['id' => auth()->user()->id])->with('success', 'ادمین جدید با موفقیت اضافه شد.');
        }
    }

    public function deleteProfile($id)
    {
        $user = User::where('id', $id)->find($id)->delete();
        return redirect()->back();
    }

    public function editProfile($id)
    {
        if (auth()->user()->id == $id){
            return view('admin-panel.pages.profile.edit');
        }else{
            abort(404);
        }

    }

    public function updateProfile($id, Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6|max:12|confirmed',
        ]);

        $user = User::where('id', $id)->find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (!$user){
            return redirect()->back()->with('error', 'ویرایش اطلاعات شما با مشکل مواجه شد لطفا مجدد تلاش کنید.');
        }else{
            return redirect()->route('profile', ['id' => $id])->with('success', 'ویرایش اطلاعات شما با موفقیت اضافه انجام شد.');
        }
    }
}
