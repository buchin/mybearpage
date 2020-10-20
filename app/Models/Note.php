<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Note extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public static function getFilename($file)
    {
        $filename = $file->getClientOriginalName();
        $filename = str_replace('.zip', '', $filename);

        return $filename;
    }
}
