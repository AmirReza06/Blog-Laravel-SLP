<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all()->sortDesc();
        $trashedCategories = Category::onlyTrashed()->get();
        if (!auth()->check()){
            return redirect()->route('post.login')->with('error', 'ابتدا باید وارد سایت شوید');
        }else{
            return view('admin-panel.pages.categories.index', compact('categories', 'trashedCategories'));
        }

    }

    public function create()
    {
        return view('admin-panel.pages.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png|max:1000',
            'title' => 'required|min:4',
        ]);

        $filename = time() . '_' . $request->image->getClientOriginalName();
        $request->image->storeAs('assets/images/categories' , $filename);

        $category = Category::create([
            'image' => $filename,
            'title' => $request->title,
        ]);

        return redirect()->route('index.category')->with('success', 'دسته بندی جدیدی با موفقیت ثبت شد.');
    }

    public function edit($id)
    {
        $category = Category::where('id' , $id)->find($id);
        return view('admin-panel.pages.categories.edit', compact('category'));
    }

    public function update($id, Request $request)
    {

        if (!isset($request->image)){

            $request->validate([
                'title' => 'required|min:4'
            ]);

            $updateCategory = Category::where('id' , $id)->find($id)->update([
                'title' => $request->title
            ]);

            if (!$updateCategory){
                return redirect()->back()->with('error', 'ویرایش با مشکل مواجه شد لطفا دوباره تلاش کنید');
            }else{
                return redirect()->route('index.category')->with('success', 'ویرایش با موفقیت انجام شد' );
            }
        }

        if ( isset($request->image)){
            $category = Category::where('id' , $id)->find($id);

            $request->validate([
                'image' => 'required|mimes:png|max:1000',
                'title' => 'required|min:4',
            ]);

            Storage::delete('assets/images/categories/' . $category->iamge);
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $request->image->storeAs('assets/images/categories' , $filename);

            $updateCategory = Category::where('id' , $id)->find($id)->update([
                'title' => $request->title,
                'image' => $filename,
            ]);

            if (!$updateCategory){
                return redirect()->back()->with('error', 'ویرایش با مشکل مواجه شد لطفا دوباره تلاش کنید');
            }else{
                return redirect()->route('index.category')->with('success', 'ویرایش با موفقیت انجام شد' );
            }
        }
        exit();
    }

    public function remake($id)
    {
        $Category = Category::onlyTrashed()->where('id' , $id)->find($id)->restore();
        return redirect()->route('index.category')->with('success', "دسته بندی مورد نظر با ایدی $id با موفقیت بازگردانی شد.");
    }

    public function forceDelete($id)
    {
        $category = Category::onlyTrashed()->where('id', $id)->find($id);
        if (empty(Post::withTrashed()->where('category_id', $id))){
            $post = Post::withTrashed()->where('category_id' , $id)->first();
            if (Comment::withTrashed()->where('post_id', $post->id)){
                $comment = Comment::withTrashed()->where('post_id', $post->id)->forceDelete();
            }
            $post->forceDelete();
        }
        $category->forceDelete();
        Storage::delete('/assets/images/posts/'. $category->image);
        return redirect()->route('index.category')->with('success', "دسته بندی مورد نظر با ایدی $id به طور کامل حذف شد.");
    }
}
