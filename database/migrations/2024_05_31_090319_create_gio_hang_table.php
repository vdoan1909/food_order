<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGioHangTable extends Migration
{
    public function up()
    {
        Schema::create('gio_hang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mon_an');
            $table->unsignedBigInteger('id_khach_hang');
            $table->integer('so_luong')->default(1);
            
            $table->foreign('id_mon_an')->references('id')->on('mon_an');
            $table->foreign('id_khach_hang')->references('id')->on('tai_khoan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gio_hang');
    }
}
