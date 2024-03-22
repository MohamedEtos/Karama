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
        Schema::create('ads_stores', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->string('text1')->nullable();
            $table->string('text2')->nullable();
            $table->string('text3')->nullable();
            $table->string('linkText')->nullable();
            $table->string('link')->nullable();
            $table->string('img1')->nullable();
            $table->string('textColor')->nullable();
            $table->string('status')->default('active');
            $table->decimal('price',9,2)->nullable();
            $table->timestamp('startAds')->nullable();
            $table->timestamp('endAds')->nullable();
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
        Schema::dropIfExists('ads_stores');
    }
};
