<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{    
    protected $primaryKey = 'product_id'; 
    public $incrementing = false;
    use HasFactory;
    use HasUuids;

    public function ownership()
    {
        if (Auth::check()) {
            return Auth::user()->user_id == $this->user->user_id;
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }


    public function productStockHistories(): HasMany
    {
        return $this->hasMany(ProductStockHistory::class, 'product_id', 'product_id');
    }
}
