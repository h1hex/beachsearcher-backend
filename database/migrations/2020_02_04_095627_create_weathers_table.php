<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weathers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('beach_id');
            $table->text('feels_like');
            $table->float('temp_min');
            $table->float('temp_max');
            $table->float('temp_water');
            $table->text('weather_icon')->nullable();
            $table->text('weather_desc')->nullable();
            $table->float('sig_height_m')->nullable();
            $table->date('date');
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
        Schema::dropIfExists('weathers');
    }
}
