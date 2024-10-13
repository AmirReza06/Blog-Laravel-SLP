<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $disapproveComments = Comment::all()->where('status', 0)->sortDesc();
        $approveComments = Comment::all()->where('status', 1)->sortDesc();
        if (!auth()->check()){
            return redirect()->route('post.login')->with('error', 'ابتدا باید وارد سایت شوید');
        }else{
            return view('admin-panel.pages.comments.index',compact('disapproveComments', 'approveComments'));
        }

    }
    public function approve($id)
    {
        $comment = Comment::where('id', $id)->find($id)->update(['status' => 1]);
        return redirect()->back()->with('success' ," کامنت $id با موفقیت تایید شد ");
    }
}
