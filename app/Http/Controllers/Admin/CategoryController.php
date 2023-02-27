<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('admin.categories.index', [
            'categoriesList' => $categoriesQueryBuilder->getCategoriesWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */
    public function create(NewsQueryBuilder $newsQueryBuilder): View
    {
        return \view('admin.categories.create', [
            'news' => $newsQueryBuilder->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required'
        ]);

        $category = new Category($request->except('_token', 'news_id'));

        if ($category->save()) {
            return \redirect()->route('admin.categories.index')->with('success', 'Category added successfully');
        }

        return \back()->with('error', 'Failed to save record');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */
    public function edit(Category $category, NewsQueryBuilder $newsQueryBuilder): View
    {
        return \view('admin.categories.edit', [
            'categories' => $category,
            'news' => $newsQueryBuilder->getAll(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $category = $category->fill($request->except('_token', 'news_ids'));
        if($category->save()) {
            $category->news()->sync((array) $request->input('news_ids'));
            return \redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
        }

        return \back()->with('error', 'Failed to save record');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
