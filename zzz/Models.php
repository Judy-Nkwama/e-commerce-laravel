<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'address'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

class Admin extends Model
{
    protected $fillable = [
        'name', 'email', 'password'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

class Product extends Model
{
    protected $fillable = [
        'name', 'quantity', 'price'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}

class OrderStatus extends Model
{
    protected $fillable = ['name', 'description'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

class Order extends Model
{
    protected $fillable = [
        'total_price', 'status'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
