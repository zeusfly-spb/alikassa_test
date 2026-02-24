<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('crypto_wallet_ledgers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')->constrained('crypto_wallets')->cascadeOnDelete();

            $table->string('type', 64); // deposit, withdrawal_lock, withdrawal_finalize, fee, unlock, ...
            $table->unsignedBigInteger('amount'); // абсолютная сумма операции в минимальных единицах

            // Дельты изменения полей кошелька (могут быть как +, так и -)
            $table->bigInteger('delta_available');
            $table->bigInteger('delta_locked');

            $table->string('reference_type', 64)->nullable(); // blockchain_tx, withdrawal_id, order_id, ...
            $table->string('reference_id', 128)->nullable();

            // Идемпотентность: один ключ = одна проводка
            $table->string('idempotency_key', 191)->nullable()->unique();

            $table->json('meta')->nullable();
            $table->timestamps();

            $table->index(['reference_type', 'reference_id']);
            $table->index(['type', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crypto_wallet_ledgers');
    }
};

