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
        $func_mth_yr = function ($value) {
            $dt = new Carbon($value);
            return $dt->year . "-" . $dt->format('F');
        };

        $news = News::orderBy('news_date', 'desc')->get(['id', 'title', 'content', 'news_date']);
        $news_month_year = $news->pluck('news_date')->all();
        $news_months_year = array_map($func_mth_yr, $news_month_year);

        return Inertia::render('Welcome', [
            'news' => $news,
            'breaking_news' => 0,
            'news_month_year' => array_unique($news_months_year),
            'featured_section' => [1, 2],
        ]);
    }
    public function NewsById($id)
    {
        $news = News::find($id)->get(['id', 'title', 'content', 'news_date']);

        return Inertia::render('News', [
            'news' => $news
        ]);
    }
    private function monthAndYear($value)
    {
        return $value;
    }
}
