<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkingLotSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_lot_spaces', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parking_lot_id');
            $table->string('status');
            $table->string('license_plate')->nullable();
            $table->timestamps();
            $table->foreign('parking_lot_id')->references('id')->on('parking_lots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parking_lot_spaces');
    }
}
