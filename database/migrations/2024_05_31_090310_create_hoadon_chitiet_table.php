<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoadonChitietTable extends Migration
{
    public function up()
    {
        Schema::create('hoadon_chitiet', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang', 20);
            $table->unsignedBigInteger('id_khach_hang');
            $table->text('id_mon_an');
            $table->integer('so_luong_mua');
            $table->string('tong_tien', 10);
            
            $table->foreign('id_khach_hang')->references('id')->on('tai_khoan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoadon_chitiet');
    }
}

