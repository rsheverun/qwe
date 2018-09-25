<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HuntingAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hunting_areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('vmap_instance_id')->foreign('vmap_instance_id')->references('id')->on('vmap_instance_configs')->onDelete('cascade');
            $table->unsignedInteger('vmap_mapviewid_id')->foreign('vmap_mapviewid_id')->references('id')->on('vmap_mapview_configs')->onDelete('cascade');;
            $table->string('description');
            $table->softDeletes();
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
        Schema::dropIfExists('hunting_areas');
    }
}
