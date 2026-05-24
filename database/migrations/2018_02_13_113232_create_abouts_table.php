<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('abouts')) {
            return;
        }

        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_title', 191)->nullable();
            $table->string('ar_title', 191)->nullable();
            $table->text('en_content')->nullable();
            $table->text('en_mission')->nullable();
            $table->text('en_vision')->nullable();
            $table->text('ar_content')->nullable();
            $table->text('ar_mission')->nullable();
            $table->text('ar_vision')->nullable();
            $table->string('image', 191);
            $table->string('type', 20)->default('company');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
