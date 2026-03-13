<?php

namespace App\Http\Controllers\Frontpages;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LatestNewsController extends Controller
{
    public function index($id, $info){
      $latestNews = Post::find($id);

    if (!$latestNews) {
        abort(404, 'News not found');
    }

    $locate = optional($latestNews->images)->first();
      return view('latest-news')->with('latestNews', $latestNews)->with('locate', $locate);
    }
}
