<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DataSource extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'data_sources';

    protected $fillable = [
        'source',
        'url',
    ];

    public function getDataSources(): Collection
    {
        return DB::table($this->table)
            ->select(['id', 'source', 'url', 'created_at', 'updated_at'])
            ->get();
    }

    public function getDataSourceById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }
}
