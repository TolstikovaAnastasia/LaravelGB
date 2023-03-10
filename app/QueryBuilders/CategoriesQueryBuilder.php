<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class CategoriesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getCategoriesWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('news')->paginate($quantity);
    }

    public function getAll(): Collection
    {
        return Category::query()->get();
    }

    public function getCategoryById(int $id): Collection
    {
        return News::query()->where('id', $id)->get();
    }
}
