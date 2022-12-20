<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name');
            $table->string('FatherName');
            $table->string('MotherName');
            $table->string('PhoneNumber');
            $table->string('Address');
            $table->string('Platenumber')->unique();
            $table->string('Model');
            $table->bigInteger('VehicleCode')->unsigned();
            $table->foreign('VehicleCode')->references('id')->on('vehicles_codes')->onDelete('cascade');
            $table->bigInteger('ModelYear')->unsigned();
            $table->foreign('ModelYear')->references('id')->on('models_years')->onDelete('cascade');
            $table->bigInteger('Horsepower')->unsigned();
            $table->foreign('Horsepower')->references('id')->on('horsepowers')->onDelete('cascade');
            $table->bigInteger('Category')->unsigned();
            $table->foreign('Category')->references('id')->on('categories')->onDelete('cascade');
            $table->string('color');
            $table->string('EngineSerialNumber');
            $table->string('StructureNo');
            $table->string('MotorLicense');
            $table->datetime('RegistrationDate');
            $table->datetime('FirstRegistrationDate');
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
        Schema::dropIfExists('vehicles');
    }
}
