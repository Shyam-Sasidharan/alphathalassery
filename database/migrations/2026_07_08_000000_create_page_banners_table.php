<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePageBannersTable extends Migration
{
    public function up()
    {
        Schema::create('page_banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page_key')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        $now = date('Y-m-d H:i:s');
        DB::table('page_banners')->insert([
            [
                'page_key' => 'about',
                'title' => 'About Alpha Center',
                'description' => 'An intellectual sanctuary dedicated to the profound synthesis of Faith, Reason, and Scientific Inquiry within the Catholic academic tradition.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'page_key' => 'courses',
                'title' => 'Course Directory',
                'description' => 'Explore our comprehensive curriculum across two specialized centers of excellence. From foundational theology to advanced religious scientific research.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'page_key' => 'courses_ahirs',
                'title' => 'Alpha Higher Institute of Religious Sciences',
                'description' => 'Linked with Dharmaram Vidya Kshetram, Bengalauru',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'page_key' => 'courses_tacrs',
                'title' => 'Tely-Alpha Center For Religious Science',
                'description' => 'Run by the Archdiocese of Tellicherry.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'page_key' => 'study_centres',
                'title' => 'Study Centers',
                'description' => 'Connect with our accredited centers of excellence across the globe. Our institutions provide the environment for rigorous inquiry and spiritual formation.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'page_key' => 'study_centres_ahirs',
                'title' => 'Alpha Higher Institute of Religious Sciences Study Centers',
                'description' => 'Connect with AHIRS accredited centers of excellence across the globe.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'page_key' => 'study_centres_tacrs',
                'title' => 'Tely-Alpha Center For Religious Sciences Study Centers',
                'description' => 'Connect with TACRS accredited centers of excellence across the globe.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'page_key' => 'faq',
                'title' => 'Common Inquiries',
                'description' => 'Find answers to frequently asked questions about our academic programs, registration, and more.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'page_key' => 'downloads',
                'title' => 'Academic Resources',
                'description' => 'Access and download important documents, application forms, and academic materials.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'page_key' => 'publications',
                'title' => 'Publications',
                'description' => 'Curating the collective wisdom of religious science through rigorous academic inquiry and scriptural excellence.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'page_key' => 'library',
                'title' => 'Library',
                'description' => 'Access Alpha Central Library facilities and collaborating theological libraries for research and reference.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'page_key' => 'contact',
                'title' => 'Connect With Us',
                'description' => 'Whether you are a prospective scholar or a curious seeker, our doors are open for dialogue and guidance.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'page_key' => 'gallery',
                'title' => 'Gallery',
                'description' => 'Explore moments from Alpha Institute academic life, programs, and community events.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('page_banners');
    }
}
