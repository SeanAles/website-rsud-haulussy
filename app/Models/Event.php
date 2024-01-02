<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    public function eventPicture()
    {
        return $this->hasMany(EventPicture::class, 'event_id' , 'id');
    }
    
}
