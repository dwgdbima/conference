<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = ['file', 'first_decision', 'note_admin', 'file_admin', 'file_first_revise', 'file_first_revise_status', 'recomendation', 'note_reviewer', 'file_reviewer', 'file_second_revise', 'file_second_revise_status', 'final_decision', 'file_final'];

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
