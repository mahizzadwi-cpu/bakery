<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('category'); // Tart, Pastry, Beverage
        $table->text('description');
        $table->decimal('price_idr', 12, 2);
        $table->text('image_url')->nullable();
        $table->integer('stock')->default(10);
        $table->timestamps();
    });
}
};