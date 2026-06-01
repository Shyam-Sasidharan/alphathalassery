<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollegeToCoursesAndCentersTables extends Migration
{
    public function up()
    {
        if (Schema::hasTable('courses') && ! Schema::hasColumn('courses', 'college')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->string('college', 191)->default('ahirs')->after('id');
            });
        }

        if (Schema::hasTable('centers') && ! Schema::hasColumn('centers', 'college')) {
            Schema::table('centers', function (Blueprint $table) {
                $table->string('college', 191)->default('ahirs')->after('id');
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('courses') && Schema::hasColumn('courses', 'college')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropColumn('college');
            });
        }

        if (Schema::hasTable('centers') && Schema::hasColumn('centers', 'college')) {
            Schema::table('centers', function (Blueprint $table) {
                $table->dropColumn('college');
            });
        }
    }
}
