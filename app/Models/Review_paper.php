<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review_paper extends Model
{
    use HasFactory;

    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(Reviewer::class);
    }
}
