<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhLuanTable extends Migration
{
    public function up()
    {
        Schema::create('binh_luan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_khach_hang');
            $table->unsignedBigInteger('id_mon_an');
            $table->text('noi_dung');
            $table->timestamp('ngay_binh_luan')->useCurrent();
            
            $table->foreign('id_khach_hang')->references('id')->on('tai_khoan');
            $table->foreign('id_mon_an')->references('id')->on('mon_an');
        });
    }

    public function down()
    {
        Schema::dropIfExists('binh_luan');
    }
}
