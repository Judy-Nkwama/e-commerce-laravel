<?php

namespace App\Models;

use App\Models\Orders;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters["tag"] ?? false) {
            $query->where("tags_string", "like", "%" . request("tag") . "%");
        }

        if ($filters["s"] ?? false) {
            $query->where("title", "like", "%" . request("s") . "%")
                ->orWhere("description", "like", "%" . request("s") . "%")
                ->orWhere("tags_string", "like", "%" . request("s") . "%");
        }
    }

    public function orders()
    {
        return $this->belongsToMany(Orders::class);
    }
}
