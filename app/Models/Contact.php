<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name','email','subject','message','created_at'];
    protected $hidden = ['created_at','updated_at'];
}
