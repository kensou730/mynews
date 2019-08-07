<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\News;
use App\Profile;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');

        if(count($posts) > 0){
            $headline = $posts->shift();
        }else{
            $headline = null;
        }
        // news/index.blade.php ファイルを渡している
        // またViewテンプレートにheadline, posts という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
    public function profile(Request $request)
    {
       $cond_name = $request->cond_name;
        if($cond_name != ''){
            $posts = Profile::where('name', $cond_name)->get();
        }else{
            $posts = Profile::all();
        }
        return view('news.profile', ['posts' => $posts, 'cond_name' => $cond_name]);
     }
}
