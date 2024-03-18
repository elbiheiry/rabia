<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_trans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('brief');
            $table->text('description1');
            $table->text('description2')->nullable();
            $table->text('features')->nullable();
            $table->string('lang');
            $table->integer('service_id');
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
        Schema::dropIfExists('service_trans');
    }
}
