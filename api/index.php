<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Fix Vercel read-only filesystem
if (!is_dir('/tmp/cache')) {
    mkdir('/tmp/cache', 0777, true);
}

$_ENV['APP_BASE_PATH'] = dirname(__DIR__);

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

// Override bootstrap/cache path ke /tmp
$app->useStoragePath('/tmp');
$app->instance('path.storage', '/tmp');

// Fix PackageManifest path
$app->singleton(\Illuminate\Foundation\PackageManifest::class, function ($app) {
    return new \Illuminate\Foundation\PackageManifest(
        new \Illuminate\Filesystem\Filesystem,
        $app->basePath(),
        '/tmp/packages.php'
    );
});

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
);

$response->send();

$kernel->terminate($request, $response);