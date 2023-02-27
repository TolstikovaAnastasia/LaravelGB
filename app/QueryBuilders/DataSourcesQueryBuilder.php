<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\DataSource;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class DataSourcesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = DataSource::query();
    }

    public function getDataSourceWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('data_sources')->paginate($quantity);
    }

    public function getAll(): Collection
    {
        return DataSource::query()->get();
    }
}
