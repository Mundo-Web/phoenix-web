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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('producto');
            $table->string('extract')->nullable();
            $table->text('description')->nullable();
            $table->decimal('precio', 12, 2)->default(0);
            $table->decimal('descuento', 12, 2)->default(0);
            $table->decimal('stock', 12)->default(0);
            $table->decimal('costo_x_art', 12, 2)->default(0);
            $table->string('peso')->nullable();
            $table->string('imagen')->nullable();
            $table->json('atributes')->nullable();
            $table->string('sku')->nullable();
            $table->string('marca_id')->nullable();
            $table->string('fit_id')->nullable();
            $table->boolean('destacar')->default(false);
            $table->boolean('recomendar')->default(false);
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->string('discount_id')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->boolean('visible')->default(true);
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categories');
            //$table->foreign('discount_id')->references('id')->on('discounts');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
