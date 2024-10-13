<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schedule;

class HomeController extends Controller
{
    public function index( Request $request)
    {
        if (isset($_GET['category'])){
            $categoryId = $_GET['category'];
            $sliders = PostSlider::all();
            $categories = Category::all();
            $posts = Post::where('category_id', $categoryId)->paginate(6);

//            dd($posts);
            return view('index', compact('categories', 'posts', 'sliders'));
        }else{
            $sliders = PostSlider::all();
            $categories = Category::all();
            $posts = Post::paginate(9);
            return view('index', compact('categories', 'posts', 'sliders'));
        }
    }

    public function content()
    {
        return view('content');
    }
}
