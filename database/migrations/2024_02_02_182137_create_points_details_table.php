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
        Schema::create('points_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pointsDetailsId')->unsigned()->nullable();
            $table->foreign('pointsDetailsId')->references('id')->on('points')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('userId')->nullable();
            $table->integer('usercode')->nullable();
            $table->integer('merchantId')->nullable();
            $table->decimal('price',9,2);
            $table->decimal('points',9,2);
            $table->enum('type',['add','Subtract']);

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
        Schema::dropIfExists('points_details');
    }
};
