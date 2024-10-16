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
        Schema::create('items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('factura_id');
            $table->uuid('item_id');
            $table->float('precio_unitario');
            $table->float('cantidad');
            $table->float('subtotal');
            $table->float('impuesto');
            $table->float('descuento');
            $table->float('total');
            $table->timestamps();

            // Definición de la clave foránea
            $table->foreign('factura_id')
            ->references('id')
            ->on('invoice')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
