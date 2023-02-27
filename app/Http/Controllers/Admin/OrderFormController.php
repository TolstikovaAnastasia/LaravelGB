<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderForm;
use App\QueryBuilders\OrderFormsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param OrderFormsQueryBuilder $orderFormQueryBuilder
     * @return View
     */
    public function index(OrderFormsQueryBuilder $orderFormQueryBuilder): View
    {
        return \view('admin.orderForm.index', [
            'orderFormList' => $orderFormQueryBuilder->getOrderFormWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.orderForm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'user' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'criteria' => 'required',
        ]);

        $orderForm = new OrderForm($request->except('_token'));

        if ($orderForm->save()){
            return \redirect()->route('admin.orderForm.index')->with('success', 'Order updated successfully');
        }

        return \back()->with('error', 'Failed to save record');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param OrderForm $orderForm
     * @return View
     */
    public function edit(OrderForm $orderForm): View
    {
        return \view('admin.orderForm.edit', [
            'orderForm' => $orderForm
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param OrderForm $orderForm
     * @return RedirectResponse
     */
    public function update(Request $request, OrderForm $orderForm): RedirectResponse
    {
        $orderForm = $orderForm->fill($request->except('_token'));
        if ($orderForm->save()) {
            return \redirect()->route('admin.orderForm.index')->with('success', 'Order updated successfully');
        }
        return \back()->with('error', 'Failed to save record');
    }
}
