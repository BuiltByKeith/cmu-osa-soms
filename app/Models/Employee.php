<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'firstname', 'middlename', 'lastname', 'extname', 'sex', 'contact_no'];
}
