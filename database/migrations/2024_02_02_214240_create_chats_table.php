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
            $table->bigInteger('sender')->unsigned()->nullable();
            $table->foreign('sender')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('recever')->unsigned()->nullable();
            $table->foreign('recever')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
