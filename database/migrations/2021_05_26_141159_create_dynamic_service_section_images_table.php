<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicServiceSectionImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic_service_section_images', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->string('caption')->nullable();
            $table->string('alt_tag')->nullable();
            $table->unsignedBigInteger('service_section_id');
            $table->foreign('service_section_id')->references('id')->on('dynamic_service_sections')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('dynamic_services')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('dynamic_service_section_images');
    }
}
