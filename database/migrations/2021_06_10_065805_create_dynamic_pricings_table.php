<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicPricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic_pricings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('dynamic_services')->constrained()->onDelete('cascade');
            $table->string('image1');
            $table->string('image2');
            $table->string('pricing_1_name');
            $table->string('pricing_1_amount');
            $table->string('pricing_2_name');
            $table->string('pricing_2_amount');
            $table->string('pricing_3_name');
            $table->string('pricing_3_amount');
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
        Schema::dropIfExists('dynamic_pricings');
    }
}
