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
        Schema::create('khachhangs', function (Blueprint $table) {
            $table->id();
            $table->string('ho_khach_hang', 30);
            $table->string('ten_khach_hang', 300);
            $table->string('so_dien_thoai', 11)->unique();
            $table->string('ten_dang_nhap', 30)->nullable()->unique();
            $table->string('email', 50)->nullable()->unique();
            $table->string('mat_khau', 100)->nullable();
            $table->string('dia_chi', 100)->nullable();
            $table->string('ma_xa')->nullable();
            $table->dateTime('lan_dang_nhap_cuoi')->nullable();
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
        Schema::dropIfExists('khachhangs');
    }
};
