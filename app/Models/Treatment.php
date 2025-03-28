<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "price",
        "room_id"
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
