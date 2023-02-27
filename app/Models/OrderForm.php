<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderForm extends Model
{
    use HasFactory;

    protected $table = 'order_forms';

    protected $fillable = [
        'user',
        'phone',
        'email',
        'criteria',
    ];
}
