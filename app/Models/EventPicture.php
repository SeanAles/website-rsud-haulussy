<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPicture extends Model
{
    use HasFactory;

    protected $fillable = [
        "path",
        "event_id"
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
