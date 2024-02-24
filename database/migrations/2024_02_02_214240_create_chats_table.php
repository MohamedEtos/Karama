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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('senderId')->unsigned()->nullable();
            $table->foreign('senderId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('reseverId')->unsigned()->nullable();
            $table->foreign('reseverId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('title');
            $table->text('body');
            $table->string('attemp')->nullable();
            $table->integer('star')->default('0');
            $table->integer('drafts')->default('0');
            $table->integer('spam')->default('0');
            $table->integer('trash')->default('0');
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
        Schema::dropIfExists('chats');
    }
};
