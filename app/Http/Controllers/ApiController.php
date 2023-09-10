<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class ApiController extends Controller
{
    public function home()
    {
        $func_mth_yr = function ($value) {
            $values = explode("-", $value);
            $month = (int) $values[1];
            $mth = "01";

            switch ($month) {
                case 1:
                    $mth = "January";
                    break;
                case 2:
                    $mth = "February";
                    break;
                case 3:
                    $mth = "March";
                    break;
                case 4:
                    $mth = "April";
                    break;
                case 5:
                    $mth = "May";
                    break;
                case 6:
                    $mth = "June";
                    break;
                case 7:
                    $mth = "July";
                    break;
                case 8:
                    $mth = "August";
                    break;
                case 9:
                    $mth = "September";
                    break;
                case 10:
                    $mth = "October";
                    break;
                case 11:
                    $mth = "November";
                    break;
                case 12:
                    $mth = "December";
                    break;
            }
            return $values[0] . "-" . $mth;
        };
        $breaking_news = 0;
        $featured_section = [1, 2];
        $news = News::orderBy('news_date', 'desc')->get(['id', 'title', 'content', 'news_date']);
        $news_month_year = News::orderBy('news_date', 'desc')->pluck('news_date')->toArray();
        $news_months_year = array_map($func_mth_yr, $news_month_year);

        return response()->json([
            'news' => $news,
            'breaking_news' => $breaking_news,
            'news_month_year' => $news_months_year,
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
