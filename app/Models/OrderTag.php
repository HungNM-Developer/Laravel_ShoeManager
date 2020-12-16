<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTag extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id','tag_id','quantity',
    ];

    public function tags() {
        return $this->belongsTo('App\Models\Tag');
    }
}
