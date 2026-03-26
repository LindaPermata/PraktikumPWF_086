<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tambahkan baris ini
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'user_id',
    ];
}