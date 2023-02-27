<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataSource;
use App\QueryBuilders\DataSourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        $model = new DataSource();

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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'source' => 'required',
        ]);

        $dataSource = new DataSource($request->except('_token'));

        if ($dataSource->save()){
            return \redirect()->route('admin.dataSource.index')->with('success', 'Source updated successfully');
        }

        return \back()->with('error', 'Failed to save record');
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
     * @param Request $request
     * @param DataSource $dataSource
     * @return RedirectResponse
     */
    public function update(Request $request, DataSource $dataSource): RedirectResponse
    {
        $dataSource = $dataSource->fill($request->except('_token'));
        if ($dataSource->save()) {
            return \redirect()->route('admin.dataSource.index')->with('success', 'Source updated successfully');
        }
        return \back()->with('error', 'Failed to save record');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
