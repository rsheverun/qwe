<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnInConfigsets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            Schema::table('configsets', function (Blueprint $table) {;
                $table->dropColumn('org_name');
                $table->dropColumn('server');
                $table->dropColumn('port');
                $table->dropColumn('user');
            });
        } catch (\Exception $e) {
            //
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configsets', function (Blueprint $table) {
            $table->string('org_name')->nullable();
            $table->string('server')->nullable();
            $table->unsignedInteger('port')->nullable();
            $table->string('user')->nullable();
        });
    }
}
