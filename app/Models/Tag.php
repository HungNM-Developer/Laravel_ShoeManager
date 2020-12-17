<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag','price','image','description','content'
    ];
    
    // public function articles() {
        
    //     return $this->belongsToMany('App\Models\Article');
        
    // }

    public function orders() {
        
        return $this->belongsToMany('App\Models\Order');
        
    }
}
