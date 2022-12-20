<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('VehicleNo')->unsigned();
            $table->foreign('VehicleNo')->references('id')->on('vehicles')->onDelete('cascade');
            $table->bigInteger('Type')->unsigned();
            $table->foreign('Type')->references('id')->on('ticket_types')->onDelete('cascade');
            $table->string('Amount');
            $table->datetime('ExpiryDate');
            $table->boolean('isDeleted',false);
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
        Schema::dropIfExists('ticket_infos');
    }
}
