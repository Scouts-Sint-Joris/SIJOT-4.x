<?php

namespace Sijot;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lease
 * ---
 * Database model for the domain leases 
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot
 */
class Lease extends Model
{
    /**
     * Mass-assign fields for the database table
     * 
     * @return array
     */
    protected $fillable = ['is_confirmed', 'persoon', 'tel_nr', 'extra_informatie', 'email', 'start_datum', 'eind_datum'];
}
