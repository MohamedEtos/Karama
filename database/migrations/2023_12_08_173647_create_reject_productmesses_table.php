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
        Schema::create('reject_productmesses', function (Blueprint $table) {
            $table->id();
            $table->text('rejectMessage')->nullable();
            $table->bigInteger('productId')->unsigned()->nullable();
            $table->integer('merchantId')->nullable();
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
        Schema::dropIfExists('reject_productmesses');
    }
};
