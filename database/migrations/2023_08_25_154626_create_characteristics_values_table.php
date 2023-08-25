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
        Schema::create('characteristics_values', function (Blueprint $table) {
            $table->id();
            $table->integer('value')->nullable();
            $table->unsignedBigInteger('goods_id');
            $table->unsignedBigInteger('char_kind_id');
            $table->timestamps();

            $table->foreign('goods_id')->references('id')->on('goods')->onDelete('cascade');
            $table->index('goods_id');

            $table->foreign('char_kind_id')->references('id')->on('char_kinds')->onDelete('cascade');
            $table->index('char_kind_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characteristics_values');
    }
};
