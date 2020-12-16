<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag_Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_id','order_id','quantity',
    ];

    public function orders() {
        
        return $this->belongsToMany('App\Models\Order');
        
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tag');
    }
}
