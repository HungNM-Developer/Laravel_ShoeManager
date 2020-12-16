<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'status',//các thuộc tính
    ];
    protected $primaryKey = 'id';
    protected $table = 'orders';

    public function user() {
        return $this->belongsTo('App\Models\User');
        //xác định quan hệ có thể đảo ngược nhau  1 order có thể truy cập đến user, 
        //và ngược lại 1 user cũng có thể truy cập lấy thông tin 1 order
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function tag_order() {
        return $this->belongsToMany('App\Models\Tag_Order');
    }
}
