<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    public function download()
    {
        return $this->hasMany(Download::class, 'download_category_id' , 'id');
    }
}
