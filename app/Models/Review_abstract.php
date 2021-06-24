<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review_abstract extends Model
{
    use HasFactory;

    public function abstract()
    {
        return $this->belongsTo(Abstractt::class, 'abstract_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(Reviewer::class);
    }
}
