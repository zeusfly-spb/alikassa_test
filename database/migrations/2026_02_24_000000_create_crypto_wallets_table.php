<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('crypto_wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('currency', 32)->index();

            // Учёт в минимальных единицах (satoshi/wei/...)
            $table->unsignedBigInteger('available')->default(0);
            $table->unsignedBigInteger('locked')->default(0);

            $table->timestamps();

            $table->unique(['user_id', 'currency']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crypto_wallets');
    }
};

