<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderForm\CreateRequest;
use App\Http\Requests\OrderForm\EditRequest;
use App\Models\OrderForm;
use App\QueryBuilders\OrderFormsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

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
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $orderForm = OrderForm::create($request->validated());

        if ($orderForm->save()) {
            return \redirect()->route('admin.orderForm.index')->with('success', __('messages.admin.orderForm.success'));
        }

        return \back()->with('error', __('messages.admin.orderForm.fail'));
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
            'orderForm' => $orderForm,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param OrderForm $orderForm
     * @return RedirectResponse
     */
    public function update(EditRequest $request, OrderForm $orderForm): RedirectResponse
    {
        $orderForm = $orderForm->fill($request->validated());
        if ($orderForm->save()) {
            return \redirect()->route('admin.orderForm.index')->with('success', __('messages.admin.orderForm.update'));
        }
        return \back()->with('error', __('messages.admin.orderForm.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param OrderForm $category
     * @return JsonResponse
     */
    public function destroy(OrderForm $orderForm): JsonResponse
    {
        try {
            $orderForm->delete();

            return \response()->json('ok');

        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);
            return \response()->json('error', 400);
        }
    }
}
