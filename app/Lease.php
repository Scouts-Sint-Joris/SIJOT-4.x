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
    protected $fillable = [
        'is_confirmed', 'persoon', 'tel_nr', 'extra_informatie', 'email', 'start_datum', 'eind_datum'
    ];

    /**
     * Convert the start date to a timestamp.
     * 
     * @param  string  $date  The start date from the input. 
     * @return string
     */
    public function setStartDateAttribute(string $date): string
    {
        return $this->attributes['start_datum'] = strtotime(str_replace('/', '-', $date));
    }

    /**
     * Convert the end date to a timestamp. 
     *
     * @param  string  $date The end date form the input.
     * @return string
     */
    public function setEndDateAttribute(string $date): string 
    {
        return $this->attributes['eind_datum'] = strtotime(str_replace('/', '-', $date));
    }
}
