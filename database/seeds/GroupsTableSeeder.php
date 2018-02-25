<?php

use Sijot\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class GroupsTableSeeder 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 */
class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $table = DB::table('groups'); 
        $table->delete(); 
        
        Group::create(['image_path' => 'images/takken/kapoenen.svg',    'titel' => 'De Kapoenen',    'sub_titel' => 'van ... tot ... jaar']);
        Group::create(['image_path' => 'images/takken/welpen.svg',      'titel' => 'De Welpen',      'sub_titel' => 'van ... tot ... jaar']);
        Group::create(['image_path' => 'images/takken/jong-givers.svg', 'titel' => 'De Jong-Givers', 'sub_titel' => 'van ... tot ... jaar']);
        Group::create(['image_path' => 'images/takken/givers.svg',      'titel' => 'De Givers',      'sub_titel' => 'van ... tot ... jaar']); 
        Group::create(['image_path' => 'images/takken/jins.svg',        'titel' => 'De Jins',        'sub_titel' => 'van ... tot ... jaar']);
        Group::create(['image_path' => 'images/takken/leiding.svg',     'titel' => 'De Leiding',     'sub_titel' => 'van ... tot ... jaar']);
    }
}
