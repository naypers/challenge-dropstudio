<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rating;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['sku', 'name', 'id_category', 'description', 'price', 'amount', 'status'];

    public function getCategory() {
        return $this->belongsTo(Category::class, 'id_category');
    }    

    public function getRatingAttribute() {
        $avgRating = Rating::where('id_product', $this->id)->avg('rating');
        return round($avgRating, 1);
    }

    public function getNumRatingAttribute() {
        return Rating::where('id_product', $this->id)->count();
    }
}
