<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\News;

class NewsController extends Controller
{
    public function home()
    {
        $news = News::orderBy('news_date', 'desc')->get(['id', 'title', 'content', 'news_date']);

        return Inertia::render('Welcome', [
            'news' => $news
        ]);
    }
    public function NewsById($id)
    {
        $news = News::find($id)->orderBy('news_date', 'desc')->get(['id', 'title', 'content', 'news_date']);

        return Inertia::render('Welcome', [
            'news' => $news
        ]);
    }
}
