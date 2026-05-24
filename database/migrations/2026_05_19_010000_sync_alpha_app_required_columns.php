<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncAlphaAppRequiredColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('centers') && ! Schema::hasColumn('centers', 'image')) {
            Schema::table('centers', function (Blueprint $table) {
                $table->string('image', 191)->nullable()->after('phone');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('centers') && Schema::hasColumn('centers', 'image')) {
            Schema::table('centers', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
    }
}
