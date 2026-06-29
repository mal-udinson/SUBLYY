<?php

// 1. Muat otomatis komponen (Autoload)
require __DIR__ . '/../vendor/autoload.php';

// 2. Ambil instansiasi aplikasi Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 3. Paksa Laravel menggunakan folder /tmp khusus serverless Vercel
$app->useStoragePath('/tmp/storage');

// 4. Jalankan aplikasi
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
$response->send();
$kernel->terminate($request, $response);