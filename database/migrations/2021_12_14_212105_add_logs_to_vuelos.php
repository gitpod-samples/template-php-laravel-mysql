<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogsToVuelos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vuelos', function (Blueprint $table) {
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
            $table->datetime('deleted_at')->nullable();       
         });
    }

    /***/
    public function down()
    {
        Schema::table('vuelos', function (Blueprint $table) {
            $table->DroppColum('created_at');
            $table->DroppColum('updated_at');
            $table->DroppColum('deleted_at');
        });
    }
}
