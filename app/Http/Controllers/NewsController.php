<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\News;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function home()
    {
        $func_mth_yr = function($value) {
            $values = explode("-", $value);
            return $values[1] . "-" . $values[0];
        };
        $breaking_news = 0;
        $news = News::orderBy('news_date', 'desc')->get(['id', 'title', 'content', 'news_date']);
        $news_month_year = News::orderBy('news_date', 'desc')->pluck('news_date')->toArray();
        $news_months_year = array_map($func_mth_yr, $news_month_year );

        return Inertia::render('Welcome', [
            'news' => $news,
            'breaking_news' => $breaking_news,
            'news_month_year' => $news_months_year,
        ]);
    }
    public function NewsById($id)
    {
        $news = News::find($id)->orderBy('news_date', 'desc')->get(['id', 'title', 'content', 'news_date']);

        return Inertia::render('News', [
            'news' => $news
        ]);
    }
    private function monthAndYear($value) {
        return $value;
    }
}
