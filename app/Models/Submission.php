<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['presenter', 'title', 'topic_id', 'type', 'payment_file'];

    use HasFactory;

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function abstract()
    {
        return $this->hasOne(Abstractt::class);
    }

    public function paper()
    {
        return $this->hasOne(Paper::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
