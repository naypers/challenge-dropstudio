<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['sku', 'name', 'id_category', 'description', 'price', 'amount', 'status'];

    public function getCategory() {
        return $this->belongsTo(Category::class, 'id_category');
    }    
}
