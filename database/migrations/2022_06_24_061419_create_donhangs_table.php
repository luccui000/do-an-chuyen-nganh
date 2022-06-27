<?php

use App\Models\DonHang;
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
        Schema::create('donhangs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang', 20);
            $table->foreignId('khachhang_id')->constrained('khachhangs');
            $table->foreignId('magiamgia_id')->nullable()->constrained('magiamgias');
            $table->integer('phi_giao_hang');
            $table->integer('thanh_tien');
            $table->integer('tong_tien');
            $table->string('phuong_thuc_thanh_toan');
            $table->string('ghi_chu')->nullable();
            $table->string('trang_thai')->default(DonHang::DANG_CHO_XAC_NHAN);
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
        Schema::dropIfExists('donhangs');
    }
};
