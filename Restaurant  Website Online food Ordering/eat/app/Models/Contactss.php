<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactss extends Model
{
    use HasFactory;
    protected $fillable= ['title', 'description', 'phone1', 'phone2', 'email1', 'email2', 'facebook', 'twitter', 'linkedin', 'instagram'];
}
