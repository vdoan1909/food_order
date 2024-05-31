<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhmucTintucTable extends Migration
{
    public function up()
    {
        Schema::create('danhmuc_tintuc', function (Blueprint $table) {
            $table->id();
            $table->string('ten_danhmuc_tintuc', 100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('danhmuc_tintuc');
    }
}

