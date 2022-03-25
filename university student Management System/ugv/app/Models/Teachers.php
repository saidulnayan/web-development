<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;
    protected $fillable= ['teachername', 'teacherid', 'email', 'dept', 'phone','teacherid','address', 'country', 'photo', 'nid', 'graduation','post','strsalary','strsalary','joiningdate','especiality'];

}
