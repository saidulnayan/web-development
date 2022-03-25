<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admissions extends Model
{
    use HasFactory;
    protected $fillable= ['firstname', 'lastname', 'gender', 'studentid', 'regno','category', 'studentemail', 'studentphone', 'nid', 'birth', 'address', 'country', 'dept', 'session', 'year', 'section', 'photo', 'parrentid', 'parrentphone', 'parentname', 'relation', 'parentemail', 'parentaddress', 'occupation', 'semfees', 'examfees'];

}
