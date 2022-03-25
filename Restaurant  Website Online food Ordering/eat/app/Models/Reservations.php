<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;
    protected $fillable= ['mark', 'mrks', 'name', 'email', 'phone', 'guests', 'date', 'time','message', 'accept', 'disable'];
}
