<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promkes extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        "date_of_released",
        "name", 
        "url",
    ];
}
