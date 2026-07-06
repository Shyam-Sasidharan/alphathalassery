<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryFoldersTable extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('gallery_folders')) {
            Schema::create('gallery_folders', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 191);
                $table->string('slug', 191)->unique();
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }

        if (Schema::hasTable('galleries') && ! Schema::hasColumn('galleries', 'gallery_folder_id')) {
            Schema::table('galleries', function (Blueprint $table) {
                $table->unsignedInteger('gallery_folder_id')->nullable()->after('id');
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('galleries') && Schema::hasColumn('galleries', 'gallery_folder_id')) {
            Schema::table('galleries', function (Blueprint $table) {
                $table->dropColumn('gallery_folder_id');
            });
        }

        Schema::dropIfExists('gallery_folders');
    }
}
