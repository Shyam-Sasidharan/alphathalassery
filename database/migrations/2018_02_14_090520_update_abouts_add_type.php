<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAboutsAddType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('abouts') || Schema::hasColumn('abouts', 'type')) {
            return;
        }

        Schema::table('abouts', function (Blueprint $table) {
            $table->string('type',20)->default('company')->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (! Schema::hasTable('abouts') || ! Schema::hasColumn('abouts', 'type')) {
            return;
        }

        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
