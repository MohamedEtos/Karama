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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('usercode');
            $table->string('email')->nullable();
            $table->string('subtype');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('startOfSubscription')->nullable();
            $table->date('endOfSubscription')->nullable();
            $table->bigInteger('userDetalis')->unsigned();
            $table->foreign('userDetalis')->references('id')->on('user_detalis')->onDelete('cascade');
            $table->time('last_seen')->nullable();
            $table->text('roles_name');
            $table->enum('status',['active','inactive'])->default('active');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
