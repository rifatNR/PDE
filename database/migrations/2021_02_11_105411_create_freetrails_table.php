<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreetrailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freetrails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('phone');
            $table->string('website')->nullable();
            $table->string('country');
            $table->string('image_format');
            $table->string('backgroundchoice');
            $table->boolean('pathneed');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('delivery_time');
            $table->string('quantity');
            $table->json('services');
            $table->text('instruction');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('freetrails');
    }
}
