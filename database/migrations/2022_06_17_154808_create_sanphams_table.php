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
        Schema::create('sanphams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('danhmuc_id')->constrained('danhmucs');
            $table->foreignId('thuonghieu_id')->constrained('thuonghieus');
            $table->foreignId('nhacungcap_id')->constrained('nhacungcaps');
            $table->string('ten_sp', 200);
            $table->string('hinh_anh', 200)->nullable();
            $table->string('ma_sp', 100);
            $table->string('mo_ta_ngan', 200);
            $table->text('mo_ta')->nullable();
            $table->double('gia_sp');
            $table->double('gia_khuyen_mai');
            $table->tinyInteger('sp_noi_bat')->default(0)->nullable();
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
        Schema::dropIfExists('sanphams');
    }
};
