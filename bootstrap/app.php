<?php

use Illuminate\Foundation\Application;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Contracts\Debug\ExceptionHandler;

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
*/

$app = new Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Arahkan cache ke /tmp (Vercel read-only filesystem fix)
|--------------------------------------------------------------------------
*/

$app->useStoragePath('/tmp');

$app->singleton('path.storage', function () {
    return '/tmp';
});

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
*/

$app->singleton(Kernel::class, App\Http\Kernel::class);

$app->singleton(ConsoleKernel::class, App\Console\Kernel::class);

$app->singleton(ExceptionHandler::class, App\Exceptions\Handler::class);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
*/

return $app;