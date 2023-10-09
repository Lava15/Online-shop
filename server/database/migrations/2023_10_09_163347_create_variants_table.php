<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->index()->constrained()->cascadeOnDelete();

            $table->string('color');
            $table->string('type');
            $table->string('brand')->nullable();
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('retail_price');
            $table->date('relesed_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
