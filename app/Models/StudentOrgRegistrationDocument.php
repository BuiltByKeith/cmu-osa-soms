<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOrgRegistrationDocument extends Model
{
    use HasFactory;

    protected $fillable = ['student_org_id', 'ay_semester_id', 'acad_year_id', 'file_path', 'file_name'];

    public function studentOrg()
    {
        return $this->belongsTo(StudentOrganization::class, 'student_org_id', 'id');
    }

    public function semester()
    {
        return $this->belongsTo(AySemester::class, 'ay_semester_id', 'id');
    }

    public function acadYear()
    {
        return $this->belongsTo(AcadYear::class,'acad_year_id', 'id');
    }
}
