<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class CategoriesController extends Controller
{
    use NewsTrait;

    public function index(): View
    {
        return \view('categories.index', [
            'categories' => $this->getCategories(),
        ]);
    }

    public function show(int $category_id): View
    {
        return \view('categories.show', [
            'categories' => $this->getCategories($category_id)
        ]);
    }
}
