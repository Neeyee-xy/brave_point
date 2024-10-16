<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
     public function Order():HasOne
    {
         return $this->hasOne(Order::class,'cart_order_id');
    }
}
