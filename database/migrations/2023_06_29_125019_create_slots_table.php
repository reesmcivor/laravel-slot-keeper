<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start');
            $table->dateTime('finish');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('slots');
    }
};
