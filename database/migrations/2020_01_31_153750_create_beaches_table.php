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
            $table->string('title');
            $table->double('lat');
            $table->double('lon');
            $table->float('rating');
            $table->string('location');
            $table->string('specifications');
            $table->text('pictures')->nullable();
            $table->text('panoramas')->nullable();
            $table->string('video_url')->nullable();
            $table->string('length')->nullable();
            $table->float('width')->nullable();
            $table->float('quality_beach')->nullable();
            $table->float('quality_water')->nullable();
            $table->text('other_specifications')->nullable();
            $table->text('short_description')->nullable();
            $table->text('cover')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('poi_img')->nullable();
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
