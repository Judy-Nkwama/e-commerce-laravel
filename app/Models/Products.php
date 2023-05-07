<?php

namespace App\Models;

use App\Models\Sepet;
use App\Models\Orders;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'tags_string', 'price', "quantity", "bg_image_link"
    ];

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

        if (($filters["tags_string"] ?? false) && ($filters["product_id"] ?? false)) {
            $tags = explode(",", $filters["tags_string"]);
            $query->where(function ($query) use ($tags) {
                foreach ($tags as $tag) {
                    $query->orWhereRaw("FIND_IN_SET(?, tags_string) > 0", [$tag]);
                }
            })->where('id', '<>', $filters["product_id"]);
        }
    }

    public function orders()
    {
        return $this->belongsToMany(Orders::class);
    }

    public function sepet()
    {
        return $this->belongsToMany(Sepet::class, "product_id");
    }
}
