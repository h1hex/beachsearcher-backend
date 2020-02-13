<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeachValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beach_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('beach_id');
            $table->integer('param_id')->nullable();
            $table->integer('catalog_id')->nullable();
            $table->integer('int')->nullable();
            $table->double('double')->nullable();
            $table->timestamp('date')->nullable();
            $table->boolean('boolean')->nullable();
            $table->text('string')->nullable();
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
        Schema::dropIfExists('beach_values');
    }
}
