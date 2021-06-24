<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = ['file', 'status_admin', 'comment_admin', 'file_admin', 'status_reviewer', 'comment_reviewer', 'file_reviewer'];

    use HasFactory;

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public function reviewPaper()
    {
        return $this->hasOne(Review_paper::class);
    }
}
