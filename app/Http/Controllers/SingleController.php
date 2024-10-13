<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function index($id)
    {
        $comments = Comment::where('status' , 1)->where('post_id' , $id)->get();
        $post = Post::where('id' , $id)->find($id);
        return view('single', compact('post', 'comments'));
    }

    public function addComment($id, Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'comment' => 'required'
        ]);

        $comment = Comment::create([
            'name' => $request->name,
            'comment' => $request->comment,
            'status' => 0,
            'post_id' => $id
        ]);

        if (!$comment){
            return redirect()->back()->with('error', 'ارسال کامنت موفقیت امیز نبود');
        }else{
            return redirect()->back()->with('success', 'کامنت با موفقیت فرستاده شد و پس از تایید نمایش داده میشود');
        }
    }
}
