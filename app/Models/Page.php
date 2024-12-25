<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Page extends Model implements HasMedia
{
    use SoftDeletes;
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['title', 'description'];

    public function getRouteKeyName(): string {
        return 'slug';
    }
}
