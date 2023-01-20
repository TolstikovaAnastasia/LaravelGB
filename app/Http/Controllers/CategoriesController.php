<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class CategoriesController extends Controller
{
    use NewsTrait;

    public function index()
    {
        return \view('categories.index', [
            'categories' => $this->getCategories(),
        ]);
    }

    public function show(int $category_id)
    {
        return $this->getCategories($category_id);
    }
}
