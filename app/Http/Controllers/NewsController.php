<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    use NewsTrait;

    public function index(): View
    {
        return \view('news.index', [
            'news' => $this->getNews(),
        ]);
    }

    public function show(int $news_id): View
    {
        return \view('news.show', [
            'news' => $this->getNews($news_id)
        ]);
    }
}
