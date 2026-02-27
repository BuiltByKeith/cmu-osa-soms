<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentComment extends Model
{
    use HasFactory;

    protected $fillable = ['act_attachment_id', 'user_id', 'comment_details'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function actAttachment()
    {
        return $this->belongsTo(ActAttachment::class,'act_attachment_id','id');
    }
}
