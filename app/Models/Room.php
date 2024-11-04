<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    public function treatment()
    {
        return $this->hasMany(Treatment::class, 'room_id' , 'id');
    }
}
