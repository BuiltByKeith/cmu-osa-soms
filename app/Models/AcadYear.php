<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcadYear extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function semesters()
    {
        return $this->hasMany(AySemester::class);
    }
}
