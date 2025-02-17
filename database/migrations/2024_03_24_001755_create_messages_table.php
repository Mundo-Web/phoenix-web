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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->string('full_name')->nullable();
            $table->string('email')->nullable();

            $table->string('birthay')->nullable();
            $table->string('objective')->nullable();
            $table->string('other')->nullable();

            $table->string('phone')->nullable();
            $table->text('message')->nullable();
            $table->string('service_product')->nullable();
            $table->string('source')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('is_read')->default(false);
            $table->string('comunication')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
