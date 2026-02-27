<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgRegistration extends Model
{
    use HasFactory;

    protected $fillable = ['image_path', 'organization_name', 'accreditation_no', 'type_of_org_id', 'acronym'];

    public function typeOfOrg()
    {
        return $this->belongsTo(TypeOfOrganization::class, 'type_of_org_id', 'id');
    }
}
