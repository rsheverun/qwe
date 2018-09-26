<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCameraHuntingAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('camera_hunting_area', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('camera_id');
        //     $table->integer('hunting_area_id');
        //     $table->timestamps();
        // });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camera_hunting_area');
    }
}
