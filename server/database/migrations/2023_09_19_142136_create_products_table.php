<?php

use App\Domain\Catalog\Enums\ProductStatus;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->index()->nullable();
            $table->foreignIdFor(User::class, 'created_by');
            $table->foreignIdFor(User::class, 'updated_by');
            $table->foreignIdFor(User::class, 'deleted_by');

            $table->uuid('key');
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->string('short_description')->nullable();
            $table->string('thumb_image')->nullable();
            $table->mediumText('description')->nullable();
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('retail_price')->default(0);
            $table->unsignedInteger('quantity')->default(0);

            $table->boolean('is_active')->default(false);
            $table->string('status')->default(ProductStatus::IN_STOCK->value);

            $table->timestamps();
            $table->softDeletes();

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
