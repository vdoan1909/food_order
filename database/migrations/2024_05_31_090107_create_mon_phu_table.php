<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonPhuTable extends Migration
{
    public function up()
    {
        Schema::create('mon_phu', function (Blueprint $table) {
            $table->id();
            $table->string('ten_mon_phu', 100);
            $table->string('anh_mon_phu', 255);
            $table->integer('gia_mon_phu');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mon_phu');
    }
}

