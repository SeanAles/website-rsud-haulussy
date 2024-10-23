<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "date_of_released",
        "slug",
    ];

    public function eventPicture()
    {
        return $this->hasMany(EventPicture::class, 'event_id' , 'id');
    }
    
}
