<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "url",
        "download_category_id"
    ];

    public function downloadCategory()
    {
        return $this->belongsTo(DownloadCategory::class);
    }
}
