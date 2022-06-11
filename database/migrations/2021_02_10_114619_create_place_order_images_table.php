<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceOrderImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_order_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('placeorder_id');
            $table->string('images');
            $table->timestamps();
            $table->foreign('placeorder_id')->references('id')->on('placeorders')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_order_images');
    }
}
