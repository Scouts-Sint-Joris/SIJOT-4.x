<?php

namespace Sijot;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait; 
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

/**
 * Class Article 
 * ---
 * Database model for the articles
 * 
 * @todo Implement media library
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot
 */
class Article extends Model implements HasMediaConversions 
{
    use HasSlug, HasMediaTrait; 

    /**
     * Mass-assign fields for the database table. 
     * 
     * @return array
     */
    protected $fillable = ['status', 'author_id', 'status', 'titel', 'bericht'];

    /**
     * Typecast for specific database columns. 
     * 
     * @return array
     */
    protected $casts = ['created_at' => 'date:d-m-y H:i:s', 'updated_at' => 'datetime:d-m-Y H:i:s'];

    /**
     * Data relation for the author information. 
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id')
            ->withDefault(['name' => 'Onbekende gebruiker']);
    }

    /**
     * De configuratie voor de de afbeeldingen van het artikel. 
     * 
     * @param  Media|bool $media Het gegeven media item.
     * @return void
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb-100')
            ->height(100)
            ->width(100)
            ->performOnCollections('images');
    }

    /**
     * Get the options for generating the slug.
     * 
     * @return \Spatie\Sluggable\SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('titel')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(50)
            ->doNotGenerateSlugsOnUpdate();
    }
}
