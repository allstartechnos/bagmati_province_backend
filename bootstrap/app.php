<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\Admin\UserMiddleware;
use App\Http\Middleware\Admin\AdminMiddleware;
use App\Http\Middleware\Admin\SuperAdminMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\HandleCors;

return Application::configure(basePath: dirname(__DIR__))

    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware): void {

        // ✅ ENABLE CORS (VERY IMPORTANT)
        $middleware->append(HandleCors::class);

        // ✅ API middleware group
        $middleware->group('api', [
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);

        // ✅ Custom aliases
        $middleware->alias([
            'isSuperAdmin' => SuperAdminMiddleware::class,
            'isAdmin' => AdminMiddleware::class,
            'isUser' => UserMiddleware::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
