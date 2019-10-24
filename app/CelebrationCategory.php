<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CelebrationCategory extends Model
{
    protected $fillable = ['categoryName','categoryDescription','publicationStatus', 'created_at ','updated_at'];
}
