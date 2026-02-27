<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentTemplates extends Model
{
    use HasFactory;

    protected $fillable = ['document_name', 'file_path', 'document_category_id'];

    public function category()
    {
        return $this->belongsTo(DocumentCategory::class, 'document_category_id', 'id');
    }
}
