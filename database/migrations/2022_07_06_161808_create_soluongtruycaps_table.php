<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soluongtruycaps', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('so_luong')->default(0);
            $table->unsignedInteger('soluongtruycapable_id');
            $table->string('soluongtruycapable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soluongtruycaps');
    }
};
