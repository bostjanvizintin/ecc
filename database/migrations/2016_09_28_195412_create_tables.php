<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensorboxes', function(Blueprint $table){
            $table->string('hash');
            $table->string('name');
            $table->integer('numOfInputs');
            $table->integer('idUser')->references('id')->on('users');
            $table->timestamps();
            $table->primary('hash');
        });
        Schema::create('measurementPoints', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->timestamps();
        });
        Schema::create('sensors', function(Blueprint $table) {  
            $table->increments('id');
            $table->string('hash');
            $table->integer('input');
            $table->integer('idMeasurementPoint')->references('id')->on('measurementPoints');
            $table->integer('idSubMeasurementPoint')->references('id')->on('measurementPoints');
            $table->timestamps();
            $table->unique(array('hash', 'input'));
        });
        Schema::create('measurements', function(Blueprint $table) {
            $table->increments('id');
            $table->decimal('value', 3, 2);
            $table->integer('idSensor')->references('id')->on('sensors');
            $table->timestamps();
        });
        Schema::create('notifications', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('idSensor')->references('id')->on('sensors');
            $table->integer('idUser')->references('id')->on('users');;
            $table->string('name');
            $table->integer('type');
            $table->decimal('value', 3, 2);
            $table->dateTime('dateFrom');
            $table->dateTime('dateTo');
            $table->boolean('active');
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
        Schema::drop('sensorboxes');
        Schema::drop('measurementPoints');
        Schema::drop('sensors');
        Schema::drop('measurements');
        Schema::drop('notifications');
    }
}