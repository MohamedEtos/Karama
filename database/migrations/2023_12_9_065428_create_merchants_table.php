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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('merchantName',100);
            $table->string('name',100);
            $table->bigInteger('categoryId')->unsigned();
            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade');
            $table->string('productDescription',100);
            $table->string('productDetalis',200);
            $table->decimal('price',9,3);
            $table->string('discount');
            $table->decimal('ThePriceAfterDiscount',9,3);
            $table->string('img')->nullable();
            $table->integer('append')->default('0');
            $table->integer('productViews')->default('1');
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
        Schema::dropIfExists('merchants');
    }
};
