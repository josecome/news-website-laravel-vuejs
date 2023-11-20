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
        return NewsResource::collection(News::all());
    }
    public function NewsById($id)
    {
        $news = News::find($id)->get(['id', 'title', 'content', 'news_date']);
        return response()->json([
            'news' => $news,
        ]);
    }
}
