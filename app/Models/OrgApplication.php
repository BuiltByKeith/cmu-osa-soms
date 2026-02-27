<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgApplication extends Model
{
    use HasFactory;

    protected $fillable = ['student_organization_id', 'status', 'ay_semester_id'];

    public function studentOrg()
    {
        return $this->belongsTo(StudentOrganization::class, 'student_organization_id', 'id');
    }

    public function aySemester()
    {
        return $this->belongsTo(AySemester::class, 'ay_semester_id', 'id');
    }
}
