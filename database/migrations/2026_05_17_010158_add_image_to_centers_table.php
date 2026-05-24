<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageToCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('centers') || Schema::hasColumn('centers', 'image')) {
            return;
        }

        Schema::table('centers', function (Blueprint $table) {
            $table->string('image')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (! Schema::hasTable('centers') || ! Schema::hasColumn('centers', 'image')) {
            return;
        }

        Schema::table('centers', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
