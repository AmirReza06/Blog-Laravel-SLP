<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Webmozart\Assert\Tests\StaticAnalysis\same;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $_GET['search'];
//        dd($keyword);

        $posts = Post::where('title', 'LIKE' , '%' . $keyword . '%')->get();
        return view('search', compact('posts'));
    }
}
