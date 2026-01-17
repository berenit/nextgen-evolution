<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Controlliamo se la connessione corrente è SQLite
        if (DB::connection() instanceof \Illuminate\Database\SQLiteConnection) {

            // Otteniamo l'istanza PDO sottostante
            $pdo = DB::connection()->getPdo();

            // Registriamo la funzione 'INET_ATON' in SQLite tramite PHP
            $pdo->sqliteCreateFunction('INET_ATON', function ($ip) {
                if ($ip === null) return null;

                // ip2long trasforma l'IP in intero (esattamente ciò che fa INET_ATON)
                // Usiamo sprintf per assicurarci che sia trattato come un intero unsigned
                $long = ip2long($ip);

                return ($long !== false) ? sprintf('%u', $long) : null;
            });
        }
    }
}
