<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataSources\CreateRequest;
use App\Http\Requests\DataSources\EditRequest;
use App\Models\DataSource;
use App\QueryBuilders\DataSourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class DataSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param DataSourcesQueryBuilder $dataSourcesQueryBuilder
     * @return View
     */
    public function index(DataSourcesQueryBuilder $dataSourcesQueryBuilder): View
    {
        return \view('admin.dataSource.index', [
            'dataSourceList' => $dataSourcesQueryBuilder->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.dataSource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $category = DataSource::create($request->validated());

        if ($category->save()) {
            return \redirect()->route('admin.dataSource.index')->with('success', __('messages.admin.dataSource.success'));
        }

        return \back()->with('error', __('messages.admin.dataSource.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DataSource $dataSource
     * @return View
     */
    public function edit(DataSource $dataSource): View
    {
        return \view('admin.dataSource.edit', [
            'dataSource' => $dataSource
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param DataSource $dataSource
     * @return RedirectResponse
     */
    public function update(EditRequest $request, DataSource $dataSource): RedirectResponse
    {
        $dataSource = $dataSource->fill($request->validated());
        if($dataSource->save()) {
            return \redirect()->route('admin.dataSource.index')->with('success', __('messages.admin.dataSource.update'));
        }

        return \back()->with('error', __('messages.admin.dataSource.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DataSource $dataSource
     * @return JsonResponse
     */
    public function destroy(DataSource $dataSource): JsonResponse
    {
        try {
            $dataSource->delete();

            return \response()->json('ok');

        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);
            return \response()->json('error', 400);
        }
    }
}
