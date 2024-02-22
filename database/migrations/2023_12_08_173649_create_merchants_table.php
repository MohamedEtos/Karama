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
            $table->bigInteger('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->string('name',100);
            $table->bigInteger('categoryId')->unsigned();
            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade');
            $table->string('subCat');
            $table->string('productDescription',100);
            $table->string('productDetalis',200);
            $table->decimal('price',9,2);
            $table->string('discount');
            $table->decimal('ThePriceAfterDiscount',9,2);
            $table->integer('append')->default('0');
            $table->bigInteger('rejectId')->unsigned()->nullable();
            $table->foreign('rejectId')->references('id')->on('reject_productmesses')->onUpdate('cascade');
            $table->bigInteger('imgId')->unsigned();
            $table->foreign('imgId')->references('id')->on('product_imgs')->onDelete('cascade');
            // $table->integer('productViews')->default('1');
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
