<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
     public function category():BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class,'id');
    }

}
