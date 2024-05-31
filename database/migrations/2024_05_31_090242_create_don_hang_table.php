<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonHangTable extends Migration
{
    public function up()
    {
        Schema::create('don_hang', function (Blueprint $table) {
            $table->id();
            $table->string('ten_nguoi_nhan', 100);
            $table->text('dia_chi_nhan');
            $table->string('email_nhan', 255);
            $table->string('sdt_nguoi_nhan', 20);
            $table->unsignedBigInteger('id_khach_hang');
            $table->text('ghi_chu')->nullable();
            
            $table->foreign('id_khach_hang')->references('id')->on('tai_khoan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('don_hang');
    }
}

