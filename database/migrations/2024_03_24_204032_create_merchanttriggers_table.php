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
        CREATE TRIGGER before_delete_product
        BEFORE DELETE ON merchants
        FOR EACH ROW
        INSERT INTO merchanttriggers(userId,name,categoryId,subCat,productDescription,productDetalis,price,discount,ThePriceAfterDiscount,append,rejectId,imgId,created_at,updated_at)
        VALUES(old.userId,old.name,old.categoryId,old.subCat,old.productDescription,old.productDetalis,old.price,old.discount,old.ThePriceAfterDiscount,old.append,old.rejectId,old.imgId,old.created_at,old.updated_at)
        ');


        Schema::create('merchanttriggers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId')->unsigned();
            $table->string('name',100);
            $table->bigInteger('categoryId')->unsigned();
            $table->bigInteger('subCat')->unsigned();
            $table->string('productDescription',100);
            $table->string('productDetalis',200);
            $table->decimal('price',9,2);
            $table->string('discount');
            $table->decimal('ThePriceAfterDiscount',9,2);
            $table->integer('append')->default('0');
            $table->bigInteger('rejectId')->unsigned()->nullable();
            $table->bigInteger('imgId')->unsigned();
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
        Schema::dropIfExists('merchanttriggers');
    }
};
