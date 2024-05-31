<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhMucTable extends Migration
{
    public function up()
    {
        Schema::create('danh_muc', function (Blueprint $table) {
            $table->id();
            $table->string('ten_danh_muc', 100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('danh_muc');
    }
}

