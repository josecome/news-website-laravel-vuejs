<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
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

        $news = News::with('user')->orderBy('news_date', 'desc')->get();
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
        $news = News::find($id)->with('user')->get();
        $comments = News::find($id)->comments;
        $likes = News::find($id)->likes;
        $likes = Like::where('likeable_id', '=', $id)->where('likeable_type', '=', 'App\Models\News')->whereIn('type', ['like', 'love', 'sad'])->get();
        $like = count($likes->where('type', 'like'));
        $love = count($likes->where('type', 'love'));
        $sad = count($likes->where('type', 'sad'));

        return Inertia::render('News', [
            'news' => $news,
            'comments' => $comments,
            'like'=> $like,
            'love'=> $love,
            'sad'=> $sad,
        ]);
    }
    private function monthAndYear($value)
    {
        return $value;
    }
}
