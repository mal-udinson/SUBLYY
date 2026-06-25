<?php
if (!function_exists('getBrandBackground')) {
    function getBrandBackground($nama) {
        $brands = [
            'Netflix'     => 'background:#141414;',
            'Spotify'     => 'background:#1db954;',
            'Disney+'     => 'background:#1a3a8f;',
            'YouTube'     => 'background:#cc0000;',
            'ChatGPT'     => 'background:#10a37f;',
            'Canva'       => 'background:#7c3aed;',
            'Notion'      => 'background:#ffffff;',
        ];
        return $brands[$nama] ?? 'background:#1e293b;';
    }
}