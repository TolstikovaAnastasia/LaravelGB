<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\OrderForm;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class OrderFormsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = OrderForm::query();
    }

    public function getOrderFormWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('order_forms')->paginate($quantity);
    }

    public function getAll(): Collection
    {
        return OrderForm::query()->get();
    }
}
