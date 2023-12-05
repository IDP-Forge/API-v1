<?php

namespace App\Providers;

use App\Domain\Vault\HashicorpVault;
use Illuminate\Support\ServiceProvider;
use App\Domain\Vault\Authentication\Methods\Token;
use App\Domain\Vault\Authentication\Methods\Kubernetes;
use App\Domain\Vault\Authentication\Methods\UsernamePassword;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(HashicorpVault::LARAVEL_NAME, function($app): HashicorpVault
        {
            $strategy = match(config('vault.auth_strategy')) {
                default => new Token(config('vault.auth_strategies.token.token')),
                'userpass' => new UsernamePassword(config('vault.auth_strategies.userpass.username'),  config('vault.auth_strategies.userpass.password'), config('vault.url')),
                'kubernetes' => new Kubernetes(config('vault.auth_strategies.kubernetes.jwt'), config('vault.auth_strategies.kubernetes.role'), config('vault.url'))
            };

            $engineClass = config('vault.engines.'. config('vault.engine'));

            if(!class_exists($engineClass))
            {
                throw new \UnexpectedValueException('Nonexistent class provided for Vault engine: ' . $engineClass);
            }

            $engine = new $engineClass($strategy);


            return new HashicorpVault(
                $strategy,
                $engine,
                (int)config('vault.auth_retries')
            );
        });
    }

    public function boot(): void
    {
        //
    }
}
