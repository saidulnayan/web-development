<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartCounts extends Model
{
    use HasFactory;
    protected $fillable= ['userid','cartcount','ordercount'];
}
