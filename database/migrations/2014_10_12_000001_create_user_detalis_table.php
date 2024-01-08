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
        Schema::create('user_detalis', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('website')->nullable();
            $table->string('location')->nullable();
            $table->text('bio')->nullable();
            $table->string('ProfileImage')->nullable();
            $table->string('coverImage')->nullable();
            $table->string('nationalId')->nullable();
            $table->string('maps')->nullable();
            $table->bigInteger('categoryId')->unsigned()->nullable();
            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade');                
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
        Schema::dropIfExists('user_detalis');
    }
};
