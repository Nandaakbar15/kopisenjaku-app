<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('tb_orders');
            $table->foreignId('menu_id')->references('id')->on('tb_menu');
            $table->integer('quantity');
            $table->decimal('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_order_details');
    }
};
