<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 *
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $command = $this->command;

        // Ask for db migration refresh, default is no
        if ($command->confirm('Do you wish to refresh the migration before seeding, it will clear all old data?')) {
            // Call the php artisan migrate:refresh
            $command->call('migrate:refresh');
            $command->warn('Data cleared, started form blank database.');
        }

        // Execute other database seeders
        $this->call(UserTableSeeder::class);    //! Covers also roles and permissions database table.
        $this->call(GroupsTableSeeder::class);  //! Covers thue group standard description in the database table.
    }
}
