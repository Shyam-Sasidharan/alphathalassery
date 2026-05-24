<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('admissions')) {
            return;
        }

        Schema::create('admissions', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id');
            $table->string('course', 191);
            $table->string('centre', 191)->nullable();
            $table->string('language', 191);
            $table->string('name', 191);
            $table->string('phone', 191);
            $table->string('email', 191);
            $table->string('dob', 191);
            $table->string('sex', 191);
            $table->string('nationality', 191);
            $table->string('marital', 191);
            $table->string('diocese', 191)->nullable();
            $table->string('parish', 191)->nullable();
            $table->string('qualification', 191)->nullable();
            $table->string('occupation', 191)->nullable();
            $table->string('address', 191);
            $table->string('certificate', 191)->nullable();
            $table->string('photo', 191)->nullable();
            $table->string('fee', 191)->nullable();
            

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
        Schema::dropIfExists('admissions');
    }
}
