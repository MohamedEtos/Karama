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
        Schema::create('visitors_counts', function (Blueprint $table) {
            $table->id();
            $table->integer('visits')->default('1');
            $table->string('ip_address');
            // $table->integer('productId')->nullable();
            $table->bigInteger('productId')->unsigned();
            $table->foreign('productId')->references('id')->on('merchants')->onDelete('cascade');  
            $table->integer('userId');
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
        Schema::dropIfExists('visitors_counts');
    }
};