<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Resources\NewsResource;
use Carbon\Carbon;

class ApiController extends Controller
{
    public function home()
    {
        $func_mth_yr = function ($value) {
            $dt = new Carbon($value);
            return $dt->year . "-" . $dt->format('F');
        };

        $breaking_news = 0;
        $featured_section = [1, 2];
        $news = News::all();//orderBy('news_date', 'desc')->get(['id', 'title', 'content', 'news_date']);
        $news_month_year = $news->pluck('news_date')->all();
        $news_months_year = array_map($func_mth_yr, $news_month_year);

        return response()->json([
            'news' => NewsResource::collection($news),
            'breaking_news' => $breaking_news,
            'news_month_year' => array_unique($news_months_year),
            'featured_section' => $featured_section,
        ]);
    }
    public function NewsById($id)
    {
        $news = News::find($id)->get(['id', 'title', 'content', 'news_date']);
        return response()->json([
            'news' => $news,
        ]);
    }
}
