<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToFreetrailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('freetrails', function (Blueprint $table) {
            $table->enum('status', ['new', 'accepted', 'rejected', 'processing', 'QC', 'completed'])->default('new');
            $table->boolean('mail_sent')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('freetrails', function (Blueprint $table) {
            //
        });
    }
}
