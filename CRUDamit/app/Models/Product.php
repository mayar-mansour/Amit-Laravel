<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catgeory;

class Product extends Model
{
    use HasFactory;
    Protected $fillable=[
        'id','category_id','name'
    ];

    function category()
    {
        return $this->belongsTo(Catgeory::class,'category_id');
    }
}
