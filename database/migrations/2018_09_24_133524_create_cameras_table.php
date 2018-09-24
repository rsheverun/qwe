<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cameras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cam');
            $table->string('cam_model');
            $table->string('cam_name');
            $table->string('desc');
            $table->string('lat');
            $table->string('long');
            $table->unsignedInteger('group_id')
                    ->nullable()->foreign('group_id')
                    ->references('id')
                    ->on('user_groups')
                    ->onDelete('cascade');

            $table->string('cam_email')->nullable();
            $table->unsignedInteger('config_id')
                    ->nullable()
                    ->foreign('config_id')
                    ->references('id')
                    ->on('configsets')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('cameras');
    }
}
