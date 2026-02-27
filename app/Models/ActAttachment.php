<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['activity_id', 'document_name', 'document_category_id', 'status', 'isSeen', 'status_approved_date'];

    public function category()
    {
        return $this->belongsTo(DocumentCategory::class, 'document_category_id', 'id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'act_attachment_id');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class,'activity_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(AttachmentComment::class,'act_attachment_id');
    }
}
