<?php

use App\Models\BaiViet;
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
        Schema::create('baiviets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('danhmuc_id')->constrained('danhmucs');
            $table->string('anh_bia');
            $table->string('tieu_de');
            $table->text('noi_dung');
            $table->integer('thu_tu');
            $table->string('trang_thai')->default(BaiViet::DA_CONG_BO);
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
        Schema::dropIfExists('baiviets');
    }
};
