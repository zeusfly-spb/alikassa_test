<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('crypto_withdrawals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')->constrained('crypto_wallets')->cascadeOnDelete();

            $table->string('currency', 32)->index();
            $table->unsignedBigInteger('amount');
            $table->string('address', 191);

            $table->string('status', 32)->default('pending')->index();
            // pending -> pending_review -> approved -> broadcasted -> confirmed
            // failed/cancelled => funds unlocked

            $table->string('blockchain_txid', 191)->nullable()->index();
            $table->unsignedInteger('confirmations')->default(0);

            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crypto_withdrawals');
    }
};

