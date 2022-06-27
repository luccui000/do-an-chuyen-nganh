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
        Schema::create('chitiet_donhangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donhang_id')->constrained('donhangs');
            $table->foreignId('sanpham_id')->constrained('sanphams');
            $table->integer('so_luong');
            $table->integer('don_gia');
            $table->integer('thanh_tien');
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
        Schema::dropIfExists('chitiet_donhangs');
    }
};
