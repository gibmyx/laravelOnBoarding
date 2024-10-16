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
        Schema::create('item', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreign('id_factura')->references('id')->on('invoice')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('uuid');
            $table->float('precio_unitario');
            $table->float('cantidad');
            $table->float('subtotal');
            $table->float('impuesto');
            $table->float('descuento');
            $table->float('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
