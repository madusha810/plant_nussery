<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    Protected $table = 'suppliers';
    Protected $fillable = ['name','email','pno','address','plantname','plantprice','quantity','image'];

}
