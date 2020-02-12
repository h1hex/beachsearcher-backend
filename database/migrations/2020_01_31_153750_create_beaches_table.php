<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beaches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->double('lat');
            $table->double('lon');
            $table->text('pictures')->nullable();
            $table->text('panoramas')->nullable();
            $table->text('short_description')->nullable();
            $table->integer('city_id')->nullable();
            $table->text('poi_img')->nullable();
            $table->tinyInteger('status')->default(10);
            $table->integer('created_by')->nullable();
            $table->integer('modified_by')->nullable();
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
        Schema::dropIfExists('beaches');
    }
}
