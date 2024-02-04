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
        Schema::create('point_rules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('merchantId')->unsigned();
            $table->foreign('merchantId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('exchangeLimit')->default('100');
            $table->integer('transferPoints')->default('10');
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
        Schema::dropIfExists('point_rules');
    }
};
