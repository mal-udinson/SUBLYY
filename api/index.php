<?php

// Aktifkan laporan error PHP mentah-mentah ke layar browser
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Paksa environment Laravel ke local dan aktifkan debug sebelum memuat sistem
$_ENV['APP_DEBUG'] = 'true';
$_ENV['APP_ENV'] = 'local';
putenv('APP_DEBUG=true');
putenv('APP_ENV=local');

// Muat index utama Laravel
require_once dirname(__DIR__) . '/public/index.php';