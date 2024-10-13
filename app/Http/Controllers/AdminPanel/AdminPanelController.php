<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPanelController extends Controller
{
    public function index()
    {
        $posts = Post::all()->sortDesc();
        $comments = Comment::all()->sortDesc();
        $categories = Category::all()->sortDesc();
        $messages = Message::all()->sortDesc();
        if (!auth()->check()){
            return redirect()->route('post.login')->with('error', 'ابتدا باید وارد سایت شوید');
        }else{
            return view('admin-panel.index', compact('posts', 'comments', 'categories', 'messages'));
        }
    }

    public function editProfile($id, Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'image' => 'image|max:1000',
            'email' => 'required|email'
        ]);
//        if ($request->image){
//            Storage::delete('assets/images/profiles/' . auth()->user()->image);
//            $filename = time() . '_' . $request->image->getClientOriginalName();
//            $request->image->storeAs('assets/images/profiles' , $filename);
//
//            $user = User::where('id', $id)->find($id)->update([
//                'image' => $filename,
//                'name' => $request->name,
//                'email' => $request->email,
//            ]);
//        }
            $user = User::where('id', $id)->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);


        if (!$user){
            return redirect()->back()->with('error', 'ویرایش پروفایل با مشکل مواجه شد.');
        }else{
            return redirect()->route('index.adminPanel')->with('success', 'ویرایش پروفایل شما با موفقیت ثبت شد.');
        }

    }


    public function deletePost($id)
    {
        $post = Post::where('id' , $id)->find($id)->delete();
        if (!$post){
            return redirect()->back()->with('error', 'حذف پست با مشکل مواجه شد');
        }else{
            return redirect()->back()->with('success', "حذف پست با ایدی $id با موفقیت انجام شد");
        }
    }

    public function deleteComment($id)
    {
        $comment = Comment::where('id' , $id)->find($id)->delete();
        if (!$comment){
            return redirect()->back()->with('error', 'حذف کامنت با مشکل مواجه شد');
        }else{
            return redirect()->back()->with('success', "حذف کامنت با ایدی $id با موفقیت انجام شد");
        }
    }

    public function deleteCategory($id)
    {
        $category = Category::where('id' , $id)->find($id)->delete();
        if (!$category){
            return redirect()->back()->with('error', 'حذف دسته بندی با مشکل مواجه شد');
        }else{
            return redirect()->back()->with('success', "حذف دسته بندی با ایدی $id با موفقیت انجام شد");
        }
    }

    public function deleteMessage($id)
    {
        $message = Message::where('id' , $id)->find($id)->delete();
        if (!$message){
            return redirect()->back()->with('error', 'حذف دسته بندی با مشکل مواجه شد');
        }else{
            return redirect()->back()->with('success', "حذف دسته بندی با ایدی $id با موفقیت انجام شد");
        }
    }
}
