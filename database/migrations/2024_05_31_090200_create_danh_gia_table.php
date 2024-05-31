<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhGiaTable extends Migration
{
    public function up()
    {
        Schema::create('danh_gia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mon_an');
            $table->unsignedBigInteger('id_khach_hang');
            $table->integer('so_sao');
            
            $table->foreign('id_mon_an')->references('id')->on('mon_an');
            $table->foreign('id_khach_hang')->references('id')->on('tai_khoan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('danh_gia');
    }
}

