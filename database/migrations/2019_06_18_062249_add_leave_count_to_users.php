<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLeaveCountToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('sl');
            $table->unsignedBigInteger('cl');
            $table->unsignedBigInteger('vac');
            $table->unsignedBigInteger('early');
            $table->unsignedBigInteger('od');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ( $table) {
            Schema::dropIfExists('users');
        });
    }
}
