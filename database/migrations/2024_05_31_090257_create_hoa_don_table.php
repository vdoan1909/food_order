<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonTable extends Migration
{
    public function up()
    {
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_khach_hang');
            $table->string('ma_don_hang', 20);
            $table->timestamp('ngay_mua')->useCurrent();
            $table->integer('trang_thai');
            $table->integer('loai_thanh_toan');
            
            $table->foreign('id_khach_hang')->references('id')->on('tai_khoan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoa_don');
    }
}

