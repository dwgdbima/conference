<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $guarded = ['id', 'user_id', 'created_at', 'updated_at'];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function abstract()
    {
        return $this->hasManyThrough(Submission::class, Abstractt::class);
    }

    public function paper()
    {
        return $this->hasManyThrough(Submission::class, Paper::class);
    }
}
