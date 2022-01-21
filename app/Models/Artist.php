<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('artist-images')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/jpg'])
            ->useFallbackPath(public_path('/assets/artist-fallback-image.png'))
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/jpg'])
            ->singleFile();
    }
}
