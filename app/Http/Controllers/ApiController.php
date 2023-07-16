<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class ApiController extends Controller
{
    public function home()
    {
        $breaking_news = 0;
        $news = News::orderBy('news_date', 'desc')->get(['id', 'title', 'content', 'news_date']);

        return response()->json([
            'news' => $news,
            'breaking_news' => $breaking_news
        ]);
    }
    public function NewsById($id)
    {
        $news = News::find($id)->orderBy('news_date', 'desc')->get(['id', 'title', 'content', 'news_date']);
        return json_decode($news);
    }
}
