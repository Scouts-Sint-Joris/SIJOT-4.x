<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('leases', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_confirmed');
            $table->string('persoon'); 
            $table->string('email');
            $table->text('extra_informatie');
            $table->string('start_datum'); 
            $table->string('eind_datum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('leases');
    }
}
