<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CteateCamimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camimages', function (Blueprint $table) {
            $table->increments('id');            
            $table->unsignedInteger('cam_id')
                    ->nullable()->foreign('cam_id')
                    ->references('id')
                    ->on('cameras')
                    ->onDelete('cascade');
            $table->dateTime('datum')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('bild');
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
        Schema::dropIfExists('users');
        
    }
}
