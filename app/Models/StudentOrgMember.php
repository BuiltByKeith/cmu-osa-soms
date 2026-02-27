<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOrgMember extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'student_organization_id', 'position', 'ay_semester_id', 'acad_year_id'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function studentOrg()
    {
        return $this->belongsTo(StudentOrganization::class, 'student_organization_id', 'id');
    }

    public function acadYear()
    {
        return $this->belongsTo(AcadYear::class, 'acad_year_id', 'id');
    }

    public function semester()
    {
        return $this->belongsTo(AySemester::class, 'ay_semester_id', 'id');
    }
}
