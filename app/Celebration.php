<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Celebration extends Model
{
    protected $fillable = ['productName','productPrice','productQuantity','productDescription','productPicture','publicationStatus'];
}
