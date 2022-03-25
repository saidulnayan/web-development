<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abouttext extends Model
{
    use HasFactory;
    protected $fillable= ['about_title','about_text'];
}
