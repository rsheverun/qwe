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
        if (Schema::hasTable('camimages'))
        {
            //
        }else {
            Schema::create('camimages', function (Blueprint $table) {
                $table->increments('id');            
                $table->text('cam');
                $table->text('datum')->default(\DB::raw('CURRENT_TIMESTAMP'));
                $table->text('bild');
            });
        }
       
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
