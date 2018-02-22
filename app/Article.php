<?php

namespace Sijot;

use Illuminate\Database\Eloquent\Model;

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
}
