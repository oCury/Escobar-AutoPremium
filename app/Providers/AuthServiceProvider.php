<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate; // Importa a classe Gate
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('access-dashboard', function ($user) {
            // ESTA LINHA VAI PARAR TUDO E MOSTRAR OS DADOS DO USUÁRIO
            dd($user->toArray());

            // O código abaixo não será executado
            return $user->role === 'admin';
        });
    }
}