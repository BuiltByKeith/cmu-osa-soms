<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'firstname', 'middlename', 'lastname', 'extname', 'sex', 'contact_no', 'program_id'];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }
}
