<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abstractt extends Model
{
    protected $fillable = ['file', 'status_admin', 'comment_admin', 'file_admin', 'status_reviewer', 'comment_reviewer', 'file_reviewer'];

    protected $table = 'abstracts';

    use HasFactory;

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public function reviewAbstract()
    {
        return $this->hasOne(Review_abstract::class, 'abstract_id');
    }
}
