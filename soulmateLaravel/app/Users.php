<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = ['name','email','date_of_birth','gender','persion_picture'];
}
