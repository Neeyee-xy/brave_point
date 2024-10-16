<?php

namespace App\Models;
use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
     protected $guarded = [];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
     public function transaction():BelongsTo
    {
        return $this->belongsTo(Transaction::class,'cart_order_id');
    }
    
     protected static function booted()
    {
        static::observe(OrderObserver::class);
    }
}
