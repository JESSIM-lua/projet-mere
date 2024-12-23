<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Middlewares globaux
        $middleware->append(\Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class);
        $middleware->append(\Illuminate\Session\Middleware\StartSession::class);
        $middleware->append(\App\Http\Middleware\PasswordAuthMiddleware::class); // Ajout du middleware personnalisé

        // Middleware pour les groupes web
        $middleware->group('web', [
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        ]);

        // Middleware pour les API
        $middleware->group('api', [
            \Illuminate\Routing\Middleware\ThrottleRequests::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (\Illuminate\Database\Eloquent\ModelNotFoundException $e, $request) {
            return response()->json(['error' => 'Ressource non trouvée'], 404);
        });

        $exceptions->renderable(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, $request) {
            return response()->json(['error' => 'Page non trouvée'], 404);
        });
    })
    ->create();
