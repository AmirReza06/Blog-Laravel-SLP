<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all()->sortDesc();
        $trashedPosts = Post::onlyTrashed()->get();
//        dd($trashedPosts->get());
        if (!auth()->check()){
            return redirect()->route('post.login')->with('error', 'ابتدا باید وارد سایت شوید');
        }else{
            return view('admin-panel.pages.posts.index', compact('posts', 'trashedPosts'));
        }
    }

    public function indexCreate()
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('admin-panel.pages.posts.create', compact('posts', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:4',
            'author' => 'required|min:4',
            'image' => 'required|max:2000|image',
            'body' => 'required',
        ]);

        $filename =  time() . '_' . $request->image->getClientOriginalName();
        $request->image->storeAs('/assets/images/posts', $filename);

        $post = Post::create([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'image' => $filename,
            'body' => $request->body,
        ]);

        if (!$post){
            return redirect()->back()->with('error', 'عملیات با شکست مواجه شد لطفا دوباره تلاش کنید');
        }else{
            return redirect()->route('index.post')->with('success', 'مقاله جدید با موفقیت ایجاد شد');
        }

    }

    public function edit($id)
    {
        $post = Post::where('id' , $id)->find($id);
        $categories = Category::all();
        return view('admin-panel.pages.posts.edit', compact('post', 'categories'));
    }

    public function update(Post $post, $id, Request $request)
    {
        if (!isset($request->image)) {
            $request->validate([
                'title' => 'required|min:4',
                'author' => 'required|min:4',
                'body' => 'required',
            ]);

            $updatePost1 = Post::where('id', $id)->find($id)->update([
                'title' => $request->title,
                'author' => $request->author,
                'category_id' => $request->category_id,
                'body' => $request->body,
            ]);

            if (!$updatePost1) {
                return redirect()->back()->with('error', 'ویرایش با مشکل مواجه شد لطفا دوباره تلاش کنید');
            } else {
                return redirect()->route('index.post')->with('success', 'ویرایش با موفقیت انجام شد');
            }
        }

        if (!$request->hasFile($request->image) && isset($request->image)) {
            $request->validate([
                'title' => 'required|min:4',
                'author' => 'required|min:4',
                'image' => 'required|max:2000|image',
                'body' => 'required',
            ]);

            Storage::delete('/assets/images/posts/' . $post->find($id)->image);
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $request->image->storeAs('/assets/images/posts', $filename);

            $updatePost2 = Post::where('id', $id)->find($id)->update([
                'title' => $request->title,
                'author' => $request->author,
                'category_id' => $request->category_id,
                'image' => $filename,
                'body' => $request->body,
            ]);

            if (!$updatePost2) {
                return redirect()->back()->with('error', 'ویرایش با مشکل مواجه شد لطفا دوباره تلاش کنید');
            } else {
                return redirect()->route('index.post')->with('success', 'ویرایش با موفقیت انجام شد');
            }
        }
        exit();
    }

    public function remake($id)
    {
        $post = Post::onlyTrashed()->where('id' , $id)->find($id)->restore();
        return redirect()->route('index.post')->with('success', "مقاله مورد نظر با ایدی $id با موفقیت بازگردانی شد.");
    }

    public function forceDelete($id)
    {
        $comment = Comment::withTrashed()->where('post_id' , $id)->forceDelete();
        $post = Post::onlyTrashed()->where('id', $id)->find($id);
        $post->forceDelete();
        Storage::delete('/assets/images/posts/'. $post->image);
        return redirect()->route('index.post')->with('success', "مقاله مورد نظر با ایدی $id به طور کامل حذف شد.");
    }
}
