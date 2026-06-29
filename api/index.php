<?php

// Mengarahkan ke file index asli Laravel
require_once dirname(__DIR__) . '/public/index.php';

// Memaksa Laravel menggunakan folder /tmp untuk menulis cache & session di Vercel
$app->useStoragePath('/tmp/storage');
$app->config->set('cache.stores.file.path', '/tmp/storage/framework/cache/data');
$app->config->set('session.files', '/tmp/storage/framework/sessions');
$app->config->set('view.compiled', '/tmp/storage/framework/views');