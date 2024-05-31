<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinTucTable extends Migration
{
    public function up()
    {
        Schema::create('tin_tuc', function (Blueprint $table) {
            $table->id();
            $table->string('ten_tin_tuc', 255);
            $table->text('mo_ta_tin_tuc');
            $table->string('anh', 255);
            $table->unsignedBigInteger('id_danh_muc_tin_tuc');
            // $table->timestamp('ngay_dang')->useCurrent();
            // $table->integer('trang_thai');

            $table->foreign('id_danh_muc_tin_tuc')->references('id')->on('danhmuc_tintuc');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tin_tuc');
    }
}
