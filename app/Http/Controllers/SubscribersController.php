<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Subscribers;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:16',
            'email' => 'required|email',
        ]);

        $subscriber = Subscribers::create([
            'name' => $request->name,
            'email' => $request->email
        ]);
        if (!$subscriber){
            return redirect()->back()->with('error' , 'عضویت با مشکل مواجه شد لطفا دوباره تلاش کنید .');
        }else{
            return redirect()->back()->with('success' , 'عضویت شما در خبرنامه با موفقیت انجام شد .');
        }
    }
}
