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
        Schema::create('notifies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reseverId')->unsigned();
            $table->foreign('reseverId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('senderId')->unsigned();
            $table->foreign('senderId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('messages');
            $table->integer('readed')->default('0');
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
        Schema::dropIfExists('notifies');
    }
};
