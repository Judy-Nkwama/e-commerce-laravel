<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepet extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'user_id'
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters["user_id"] ?? false) {
            $query->where("user_id", $filters["user_id"]);
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function product()
    {
        return $this->belongsTo(Products::class, "product_id");
    }
}
