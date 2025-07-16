<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * A rota "home" da aplicação (redirecionamento após login).
     *
     * Alterado para a raiz pública "/"
     */
    public const HOME = '/';

    /**
     * O namespace dos controllers, desativado para usar FQCN nas rotas.
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Definição das rotas da aplicação.
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Rotas API
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

            // Rotas Web públicas
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Rotas Admin (painel) com middleware auth e prefixo 'painel'
            Route::middleware(['web', 'auth:sanctum', config('jetstream.auth_session'), 'verified'])
                ->prefix('painel')
                ->group(base_path('routes/admin.php'));
        });
    }

    /**
     * Configuração do rate limiter da API.
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
