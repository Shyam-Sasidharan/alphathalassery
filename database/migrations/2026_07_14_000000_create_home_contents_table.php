<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHomeContentsTable extends Migration
{
    public function up()
    {
        Schema::create('home_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('section_key')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        $now = date('Y-m-d H:i:s');
        DB::table('home_contents')->insert([
            'section_key' => 'welcome',
            'title' => 'Welcome to Alpha Center for Theology and Science',
            'description' => 'The Alpha Institute stands as the guardian of dual legacies. While the Higher Institute focuses on the rigorous intellectual framework of theology, the Tely-Alpha Center serves as the experiential heart, curating the living history of religious expression. Together, we provide a holistic education that honors both the mind and the spirit.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('home_contents');
    }
}
