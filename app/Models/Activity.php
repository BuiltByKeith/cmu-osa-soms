<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['student_organization_id', 'activity_name', 'budget_allocation', 'type_of_activity_id', 'venue', 'reach_of_activity_id', 'date_time_start', 'date_time_end', 'ay_semester_id', 'acad_year_id', 'activity_category_id', 'activity_status_id', 'deadline'];

    public static function checkAndUpdateActivitiesStatus()
    {
        $activities = self::where('date_time_end', '<=', Carbon::now()->subDays(10))->get();

        foreach ($activities as $activity) {
            $activity->update(['activity_status_id' => 4]); // Closed
        }
    }

    public function studentOrg()
    {
        return $this->belongsTo(StudentOrganization::class, 'student_organization_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(ActivityCategory::class, 'activity_category_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(TypeOfActivity::class, 'type_of_activity_id', 'id');
    }

    public function reach()
    {
        return $this->belongsTo(ReachOfActivity::class, 'reach_of_activity_id', 'id');
    }

    public function semester()
    {
        return $this->belongsTo(AySemester::class, 'ay_semester_id', 'id');
    }

    public function actAttachments()
    {
        return $this->hasMany(ActAttachment::class, 'activity_id');
    }

    public function activityStatus()
    {
        return $this->belongsTo(ActivityStatus::class, 'activity_status_id', 'id');
    }
}
