<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name', 'price'
    ];

    public function registerMediaCollections(): void {
        $this
            ->addMediaCollection('image')
            ->singleFile();
            //->withResponsiveImages();
    }
}