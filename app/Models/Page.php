<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Page extends Model implements HasMedia
{
    use SoftDeletes;
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['title', 'content'];

    public function getRouteKeyName(): string {
        return 'slug';
    }

    public function registerMediaCollections(): void {
        $this
            ->addMediaCollection('main')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100);
                $this
                    ->addMediaConversion('small')
                    ->width(300)
                    ->height(300);
                $this
                    ->addMediaConversion('medium')
                    ->width(600)
                    ->height(600);
            });

        /*
        $this
            ->addMediaCollection('image')
            ->singleFile()
            ->withResponsiveImages();
        */
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        // Not Used Now
    }
}
