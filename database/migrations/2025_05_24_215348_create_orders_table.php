<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Cliente que hace el pedido
            $table->decimal('total', 10, 2);
            $table->string('status')->default('pending'); // pending, paid, shipped, delivered, cancelled
            $table->string('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_country');
            $table->string('shipping_zip');
            $table->string('phone')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

