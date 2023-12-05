<?php

return [
    'url' => env('VAULT_HOST'),
    'auth_strategy' => env('VAULT_AUTH_STRATEGY'),
    'engine' => env('VAULT_SECRETS_ENGINE'),
    'auth_retries' => (int)env('VAULT_AUTH_RETRIES', 2),
    'auth_strategies' => [
        'userpass' => [
            'username' => env('VAULT_AUTH_STRATEGY_USERNAME'),
            'password' => env('VAULT_AUTH_STRATEGY_PASSWORD')
        ],
        'token' => [
            'token' => env('VAULT_AUTH_STRATEGY_TOKEN')
        ],
        'kubernetes' => [
            'jwt' => env('VAULT_AUTH_STRATEGY_K8_JWT'),
            'role' => env('VAULT_AUTH_STRATEGY_K8_ROLE')
        ]
    ],
    'engines' => [
        'keyvalue-v2' => [
            'class' => \App\Domain\Vault\Engine\KeyValueV2\KeyValueV2::class
        ]
    ]
];
