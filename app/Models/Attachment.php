<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = ['act_attachment_id', 'file_path', 'file_name', 'status'];

    public function appAttachment()
    {
        return $this->belongsTo(ActAttachment::class, 'act_attachment_id', 'id');
    }
}
