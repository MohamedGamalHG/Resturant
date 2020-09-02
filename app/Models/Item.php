<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name','price','description','image','category_id'];
    protected $hidden = ['created_at','updated_at'];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
}
