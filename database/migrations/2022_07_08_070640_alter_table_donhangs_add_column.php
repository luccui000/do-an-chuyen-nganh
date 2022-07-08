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
        Schema::table('donhangs', function(Blueprint $table) {
            $table->string('so_dien_thoai', 11)->after('magiamgia_id');
            $table->string('ten', 50)->after('magiamgia_id');
            $table->string('ho', 50)->after('magiamgia_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('donhangs', [
            'ho',
            'ten',
            'so_dien_thoai',
        ]);
    }
};
