<?php

namespace Sijot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Article 
 * ---
 * Database model for the articles
 * 
 * @todo Implement laravel sluggable.
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot
 */
class Article extends Model
{
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
}
