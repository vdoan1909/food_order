<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLienHeTable extends Migration
{
    public function up()
    {
        Schema::create('lien_he', function (Blueprint $table) {
            $table->id();
            $table->string('hoten_lienhe', 100);
            $table->string('email_lienhe', 255);
            $table->string('sdt_lienhe', 12);
            $table->text('noi_dung');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lien_he');
    }
}

