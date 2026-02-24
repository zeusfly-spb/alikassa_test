<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default per-currency settings
    |--------------------------------------------------------------------------
    |
    | Все суммы указываются в минимальных единицах сети (satoshi/wei/…).
    | Для валют, не описанных в `currencies`, используются `defaults`.
    |
    */
    'defaults' => [
        'min_deposit_confirmations' => 3,
        'min_withdraw_confirmations' => 1,

        // Risk limits (null = no limit)
        'max_withdrawal_per_tx' => null,
        'max_withdrawal_daily' => null,
        'manual_review_threshold' => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | Currency overrides
    |--------------------------------------------------------------------------
    |
    | Пример:
    | 'BTC' => [
    |   'min_deposit_confirmations' => 2,
    |   'max_withdrawal_per_tx' => 1000000,
    | ]
    |
    */
    'currencies' => [
        // 'BTC' => [],
        // 'ETH' => [],
        // 'USDT-TRC20' => [],
    ],
];

