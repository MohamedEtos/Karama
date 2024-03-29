<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            // $table->integer('userId')->nullable();
            $table->bigInteger('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('usercode');
            // $table->integer('merchantId');
            $table->bigInteger('merchantId')->unsigned();
            $table->foreign('merchantId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('price',9,2);
            $table->decimal('points',9,2);

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
        Schema::dropIfExists('points');
    }
};
