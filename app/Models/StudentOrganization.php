<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOrganization extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'accreditation_no', 'organization_name', 'acronym', 'type_of_org_id', 'registration_status', 'clearance_status', 'image_path'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'student_organization_id');
    }

    public function studentOrgMembers()
    {
        return $this->hasMany(StudentOrgMember::class,'student_organization_id');
    }

    public function typeOfOrg()
    {
        return $this->belongsTo(TypeOfOrganization::class,'type_of_org_id', 'id');
    }

    public function studentOrgAdvisers()
    {
        return $this->hasMany(StudentOrgAdviser::class,'student_organization_id');
    }

    public function registrationDocuments()
    {
        return $this->has(StudentOrgRegistrationDocument::class, 'student_org_id');
    }
}
