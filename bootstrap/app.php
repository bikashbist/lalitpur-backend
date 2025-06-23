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
        // Add your middleware to the 'web' group
        $middleware->web(append: [
            \App\Http\Middleware\SetLocale::class,
        ]);
        
        // Or if you want to prepend it:
        // $middleware->web(prepend: [
        //     \App\Http\Middleware\SetLocale::class,
        // ]);
        
        // You can also add it to other groups or as global middleware
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();