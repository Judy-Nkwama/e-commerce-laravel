<?php

namespace App\Models;

use App\Models\User;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderStatus extends Model
{
    protected $fillable = ['name', 'description'];

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}

class Orders extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Products::class);
    }

    public function status()
    {
        return $this->hasOne(OrderStatus::class);
    }
}


class OrderItems extends Model
{

    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function product()
    {
        return $this->hasOne(Orders::class);
    }
}
