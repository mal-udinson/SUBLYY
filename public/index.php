<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($storage = __DIR__.'/../storage/framework/maintenance.php')) {
    require $storage;
}

// Register the Auto Loader...
require __DIR__.'/../vendor/autoload.php';

// Run the Application...
$app = require_once __DIR__.'/../bootstrap/app.php';

$request = Request::capture();

$response = $app->handle($request);

$response->send();

$app->terminate($request, $response);