<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
   protected $fillable=['name','email','phone','address','user_id','product_title','quantity','price','image','payment_status','delivery_status'];
}
