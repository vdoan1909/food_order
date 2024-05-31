<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonAnTable extends Migration
{
    public function up()
    {
        Schema::create('mon_an', function (Blueprint $table) {
            $table->id();
            $table->string('ten_mon_an', 100);
            $table->integer('gia_mon_an')->default(0);
            $table->string('anh_mon_an', 255);
            $table->text('mo_ta');
            $table->integer('luot_xem')->default(0);
            $table->unsignedBigInteger('id_the_loai');
            $table->timestamp('ngay_them')->useCurrent();
            
            $table->foreign('id_the_loai')->references('id')->on('danh_muc');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mon_an');
    }
}

