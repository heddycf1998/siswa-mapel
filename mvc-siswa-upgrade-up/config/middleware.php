<?php

return [
    // --- Auth / Guest ---
    ['pattern' => '', 'middleware' => 'auth'], // login dulu
    ['pattern' => '/', 'middleware' => 'auth'], // login dulu
    ['pattern' => 'auth/logout', 'middleware' => 'auth'], // login dulu
    ['pattern' => 'auth/login*', 'middleware' => 'guest'], // udah login jangan akses itu
    ['pattern' => 'auth/register*', 'middleware' => 'guest'], // udah login jangan akses itu

    // --- Siswa ---
    ['pattern' => 'siswa', 'middleware' => ['role' => ['admin', 'guru'] ]], // login dulu
    ['pattern' => 'siswa/index', 'middleware' => ['role' => ['admin', 'guru'] ]], // login dulu
    ['pattern' => 'siswa/list', 'middleware' => ['role' => ['admin', 'guru'] ] ],
    ['pattern' => 'siswa/store', 'middleware' => ['role' => ['admin'] ] ],
    ['pattern' => 'siswa/update', 'middleware' => ['role' => ['admin', 'guru'] ] ],
    ['pattern' => 'siswa/destroy', 'middleware' => ['role' => ['admin'] ] ],
    ['pattern' => 'siswa/form*', 'middleware' => ['role' => ['admin', 'guru'] ] ],
    ['pattern' => 'siswa/profil', 'middleware' => ['role' => ['siswa'] ] ],

    // --- Mapel ---
    ['pattern' => 'mapel', 'middleware' => ['role' => ['admin', 'guru'] ]], // login dulu
    ['pattern' => 'mapel/index', 'middleware' => ['role' => ['admin', 'guru'] ]], // login dulu
    ['pattern' => 'mapel/list', 'middleware' => ['role' => ['admin', 'guru'] ]], // login dulu
    ['pattern' => 'mapel/store', 'middleware' => ['role' => ['admin', 'guru'] ] ],
    ['pattern' => 'mapel/update', 'middleware' => ['role' => ['admin', 'guru'] ] ],
    ['pattern' => 'mapel/destroy', 'middleware' => ['role' => ['admin'] ] ],
    ['pattern' => 'mapel/form*', 'middleware' => ['role' => ['admin', 'guru'] ] ],
    
];

?>