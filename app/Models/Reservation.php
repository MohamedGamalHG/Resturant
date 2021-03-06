<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['name','phone','email','date_and_time','status','message'];
    protected $hidden = ['created_at','updated_at'];
}
