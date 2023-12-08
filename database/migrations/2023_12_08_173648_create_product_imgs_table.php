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



        Schema::create('product_imgs', function (Blueprint $table) {
            $table->id();
            $table->string('mainImage')->nullable();
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            // $table->foreignId('productId')->nullable()->constrained('merchant','id');
            $table->bigInteger('productId')->unsigned();
            $table->foreign('productId')->references('id')->on('merchants')->onDelete('cascade');  

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
        Schema::dropIfExists('product_imgs');
    }
};
