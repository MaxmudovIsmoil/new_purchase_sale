<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id',
        'name',
        'count',
        'pcs', // шт
        'purpose',
        'address',
        'approximate_price', // taxminiy narx
        'deleted_at',
    ];
}
