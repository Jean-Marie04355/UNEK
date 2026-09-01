<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($dbUrl = env('DATABASE_URL')) {
            $dbConfig = parse_url($dbUrl);
            if ($dbConfig) {
                config([
                    'database.default' => 'pgsql',
                    'database.connections.pgsql.driver' => 'pgsql',
                    'database.connections.pgsql.host' => $dbConfig['host'] ?? '127.0.0.1',
                    'database.connections.pgsql.port' => $dbConfig['port'] ?? 5432,
                    'database.connections.pgsql.database' => ltrim($dbConfig['path'] ?? 'laravel', '/'),
                    'database.connections.pgsql.username' => $dbConfig['user'] ?? 'root',
                    'database.connections.pgsql.password' => $dbConfig['pass'] ?? '',
                    'database.connections.pgsql.sslmode' => 'prefer',
                ]);
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
            URL::forceScheme('https');
        } elseif (request()->secure() || str_contains(request()->header('host', ''), 'loca.lt') || str_contains(request()->header('host', ''), 'onrender.com')) {
            URL::forceScheme('https');
        }
    }
}
