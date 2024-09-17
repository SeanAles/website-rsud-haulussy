<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestOnlineInformation extends Model
{
    use HasFactory;
    protected $table = 'request_online_informations';
    protected $fillable = [
        "name",
        "email",
        "phone_number",
        "information",
        "reason",
    ];
}
