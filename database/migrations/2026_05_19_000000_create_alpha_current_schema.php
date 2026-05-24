<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlphaCurrentSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('books')) {
            Schema::create('books', function (Blueprint $table) {
                $this->latin1($table);

                $table->increments('id');
                $table->integer('library_id')->index();
                $table->string('pdf', 250);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('centers')) {
            Schema::create('centers', function (Blueprint $table) {
                $this->latin1($table);

                $table->increments('id');
                $table->string('location', 250);
                $table->string('center', 250);
                $table->text('address');
                $table->string('coordinator', 250);
                $table->string('phone', 250);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('courses')) {
            Schema::create('courses', function (Blueprint $table) {
                $this->latin1($table);

                $table->increments('id');
                $table->text('home_content');
                $table->string('name', 250)->nullable();
                $table->text('content')->nullable();
                $table->string('duration', 250)->nullable();
                $table->string('fee', 250)->nullable();
                $table->string('slug', 250)->nullable();
                $table->string('image', 250);
                $table->string('heading', 250);
                $table->string('pdf', 250);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('download_categories')) {
            Schema::create('download_categories', function (Blueprint $table) {
                $this->latin1($table);

                $table->increments('id');
                $table->string('name', 200);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('downloads')) {
            Schema::create('downloads', function (Blueprint $table) {
                $this->latin1($table);

                $table->increments('id');
                $table->integer('download_category_id')->nullable()->index();
                $table->string('title', 250)->nullable();
                $table->text('content')->nullable();
                $table->string('doc', 250)->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('faqs')) {
            Schema::create('faqs', function (Blueprint $table) {
                $this->latin1($table);

                $table->increments('id');
                $table->string('question', 250);
                $table->text('answer');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('galleries')) {
            Schema::create('galleries', function (Blueprint $table) {
                $this->latin1($table);

                $table->increments('id');
                $table->string('name', 200)->nullable();
                $table->string('image', 200)->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('libraries')) {
            Schema::create('libraries', function (Blueprint $table) {
                $this->latin1($table);

                $table->increments('id');
                $table->string('name', 250)->nullable();
                $table->text('content')->nullable();
                $table->string('slug', 250)->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('news')) {
            Schema::create('news', function (Blueprint $table) {
                $this->latin1($table);

                $table->increments('id');
                $table->string('title', 250)->nullable();
                $table->text('content')->nullable();
                $table->string('slug', 250)->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('newsletter_subscribers')) {
            Schema::create('newsletter_subscribers', function (Blueprint $table) {
                $this->latin1($table);

                $table->increments('id');
                $table->string('email', 250);
                $table->timestamp('created_at')->nullable()->useCurrent();
                $table->timestamp('updated_at')->nullable();
            });
        }

        if (! Schema::hasTable('professors')) {
            Schema::create('professors', function (Blueprint $table) {
                $this->latin1($table);

                $table->increments('id');
                $table->string('name', 250);
                $table->text('content');
                $table->string('image', 250);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('publications')) {
            Schema::create('publications', function (Blueprint $table) {
                $this->latin1($table);

                $table->increments('id');
                $table->integer('category_id')->index();
                $table->string('name', 200)->nullable();
                $table->string('slug', 250)->nullable();
                $table->text('content')->nullable();
                $table->string('author', 191)->nullable();
                $table->string('price', 191)->nullable();
                $table->string('image', 200)->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('semesters')) {
            Schema::create('semesters', function (Blueprint $table) {
                $this->latin1($table);

                $table->increments('id');
                $table->integer('course_id')->unsigned();
                $table->string('semester', 191)->nullable();
                $table->text('subject')->nullable();
                $table->text('syllabus')->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('hand_books')) {
            Schema::create('hand_books', function (Blueprint $table) {
                $this->latin1($table);

                $table->increments('id');
                $table->string('file', 250)->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('hand_books');
        Schema::dropIfExists('semesters');
        Schema::dropIfExists('publications');
        Schema::dropIfExists('professors');
        Schema::dropIfExists('newsletter_subscribers');
        Schema::dropIfExists('news');
        Schema::dropIfExists('libraries');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('downloads');
        Schema::dropIfExists('download_categories');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('centers');
        Schema::dropIfExists('books');
    }

    /**
     * Apply the charset/collation used by the current SQL dump.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    private function latin1(Blueprint $table)
    {
        $table->charset = 'latin1';
        $table->collation = 'latin1_swedish_ci';
    }
}
