<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PageImage extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('page-images')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/jpg'])
            ->useFallbackUrl('/assets/page-image-fallback.png')
            ->useFallbackPath(public_path('/assets/page-image-fallback.png'))
            ->singleFile();
    }
}
