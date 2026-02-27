<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOrgAdviser extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'student_organization_id', 'ay_semester_id', 'acad_year_id'];


    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function studentOrg()
    {
        return $this->belongsTo(StudentOrganization::class,'student_organization_id', 'id');
    }

    public function semester()
    {
        return $this->belongsTo(AySemester::class,'ay_semester_id', 'id');
    }

    public function acadYear()
    {
        return $this->belongsTo(AcadYear::class,'acad_year_id', 'id');
    }
}
