<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    //
    protected $table = 'ToDo';
    protected $fillable = [
        'user_id',
        'product_name',
        'category',
        'quantity',
        'price'
    ];
}