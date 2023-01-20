<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class NewsController extends Controller
{
    use NewsTrait;

    public function index()
    {
        return \view('news.index', [
            'news' => $this->getNews(),
        ]);
    }

    public function show(int $news_id)
    {
        return $this->getNews($news_id);
    }
}
