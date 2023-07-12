<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('slot_keepers', function (Blueprint $table) {
            $table->id();
            $table->json('query');
            $table->string('query_hashed');
            $table->morphs('slot_keeperable');
            $table->dateTime('released_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('slot_keepers');
    }
};
