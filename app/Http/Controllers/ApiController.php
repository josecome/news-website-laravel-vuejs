<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Resources\NewsResource;
use App\Models\Like;

use Carbon\Carbon;

class ApiController extends Controller
{
    public function home()
    {
        $news = News::orderBy('news_date', 'desc')->get(['id', 'title', 'content', 'news_date']);

        return response()->json([
            'news' => $news,
            'breaking_news' => 0,
            'featured_section' => [1, 2],
        ]);
    }
    public function NewsById($id)
    {
        $news = News::find($id)->with('user')->get();
        $comments = News::find($id)->comments;
        $likes = News::find($id)->likes;
        $likes = Like::where('likeable_id', '=', $id)->where('likeable_type', '=', 'App\Models\News')->whereIn('type', ['like', 'love', 'sad'])->get();
        $like = count($likes->where('type', 'like'));
        $love = count($likes->where('type', 'love'));
        $sad = count($likes->where('type', 'sad'));

        return response()->json([
            'news' => $news,
            'comments' => $comments,
            'like'=> $like,
            'love'=> $love,
            'sad'=> $sad,
        ]);
    }
}
