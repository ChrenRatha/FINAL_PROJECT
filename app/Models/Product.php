<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'productid';

    protected $fillable = [
        'productname',
        'price',
        'quantity',
        'description',
        'catid'
    ];

    public function cat()
    {
        return $this->belongsTo(
            Category::class,
            'catid',
            'categoryid'
        );
    }
}