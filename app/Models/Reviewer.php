<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    protected $fillable = ['name'];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviewAbstracts()
    {
        return $this->hasMany(Review_abstract::class);
    }

    public function reviewPapers()
    {
        return $this->hasMany(Review_paper::class);
    }
}
