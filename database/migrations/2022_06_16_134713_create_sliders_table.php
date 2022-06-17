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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('background_image', 200);
            $table->string('primary_text', 100);
            $table->string('secondary_text', 100);
            $table->string('description', 200)->nullable();
            $table->string('url')->nullable();
            $table->string('link_product')->nullable();
            $table->tinyInteger('is_top')->default(0);
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
        Schema::dropIfExists('sliders');
    }
};
