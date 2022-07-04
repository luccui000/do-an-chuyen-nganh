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
        Schema::table('donhangs', function (Blueprint $table) {
            $table->string('ma_xa', 10)->after('magiamgia_id');
            $table->string('dia_chi', 255)->after('tong_tien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('donhangs', ['ma_xa', 'dia_chi']);
    }
};
