<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaiKhoanTable extends Migration
{
    public function up()
    {
        Schema::create('tai_khoan', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten', 100);
            $table->string('so_dien_thoai', 12);
            $table->string('email', 255)->unique();
            $table->string('mat_khau', 255);
            $table->string('anh', 255);
            $table->text('dia_chi');
            $table->integer('vai_tro')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tai_khoan');
    }
}

