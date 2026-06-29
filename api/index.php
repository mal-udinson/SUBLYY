<?php

// 1. Aktifkan penanganan error mentah
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Muat otomatis komponen (Autoload) bawaan Laravel
require __DIR__ . '/../vendor/autoload.php';

// 3. Ambil instansiasi aplikasi Laravel sebelum dia berjalan
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 4. Paksa Laravel menggunakan folder /tmp khusus serverless Vercel
$app->useStoragePath('/tmp/storage');

// 5. Jalankan aplikasi seperti yang biasa dilakukan oleh public/index.php
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
$response->send();
$kernel->terminate($request, $response);