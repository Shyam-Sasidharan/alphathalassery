<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailFieldsToCoursesTable extends Migration
{
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            if (! Schema::hasColumn('courses', 'mode')) {
                $table->string('mode', 250)->nullable()->after('duration');
            }

            if (! Schema::hasColumn('courses', 'type')) {
                $table->string('type', 250)->nullable()->after('mode');
            }

            if (! Schema::hasColumn('courses', 'intake')) {
                $table->string('intake', 250)->nullable()->after('type');
            }
        });
    }

    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            if (Schema::hasColumn('courses', 'intake')) {
                $table->dropColumn('intake');
            }

            if (Schema::hasColumn('courses', 'type')) {
                $table->dropColumn('type');
            }

            if (Schema::hasColumn('courses', 'mode')) {
                $table->dropColumn('mode');
            }
        });
    }
}
