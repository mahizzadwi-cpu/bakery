<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('order_code')->unique();
        $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
        $table->string('customer_name');
        $table->string('customer_phone');
        $table->integer('quantity');
        $table->date('delivery_date');
        $table->enum('order_type', ['delivery', 'pickup'])->default('delivery');
        $table->text('address')->nullable();
        $table->text('order_notes')->nullable();
        $table->decimal('total_price', 12, 2);
        $table->enum('status', ['pending', 'confirmed', 'completed'])->default('pending');
        $table->timestamps();
    });
}
};
