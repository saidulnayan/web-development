<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkouts extends Model
{
    use HasFactory;
    protected $fillable= ['mark', 'mrks','name', 'orderid', 'product', 'cost', 'address', 'payment','email','accept', 'disable'];

}
