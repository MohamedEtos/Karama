<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        DB::unprepared('
        CREATE TRIGGER php
        BEFORE DELETE ON o_t_p_points
        FOR EACH ROW
        INSERT INTO o_t_p_triggers(userId,merchantId,OTP,succeed)
        VALUES(old.userId,old.merchantId,old.OTP,old.succeed)
        ');

        Schema::create('o_t_p_triggers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId');
            $table->bigInteger('merchantId');
            $table->integer('OTP');
            $table->string('succeed')->default(0);
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
        Schema::dropIfExists('o_t_p_triggers');
    }
};
