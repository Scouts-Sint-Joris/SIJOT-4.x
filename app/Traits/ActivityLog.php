<?php

namespace Sijot\Traits;

/**
 * Trait ActivityLog
 * ---
 * Trait for internal user activity Logging
 *
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot\Traits
 */
trait ActivityLog
{
    /**
     * Write an activity log to the database
     *
     * @param  mixed  $model    The database model where the action happend on
     * @param  string $message  The log message that needs to be saved.
     * @return void
     */
    public function logActivity($model, string $message): void
    {
        activity()
            ->performedOn($model)
            ->causedBy(auth()->user())
            ->log($message);
    }
}