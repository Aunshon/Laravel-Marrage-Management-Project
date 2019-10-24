<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userProfile extends Model
{
    protected $fillable = ['customer_id','company','address','zip_code','phone',];
}
