<?php

namespace App\Models;
use App\Observers\BlogObserver;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
    protected static function booted()
    {
        static::observe(BlogObserver::class);
    }
}
