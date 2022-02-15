<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FeaturedVideo extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['youtube_url'];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('video-images')
            ->useFallbackUrl('/assets/page-image-fallback.png')
            ->useFallbackPath(public_path('/assets/featured-video-fallback-image.png'))
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/jpg'])
            ->singleFile();
    }
}
