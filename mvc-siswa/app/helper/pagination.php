<?php
require_once __DIR__ . '/../../config/config.php';

function pagination($totalData, $dataPerHalaman, $halamanAktif, $extraParams = []) {
    $baseUrl = BASE_URL . '/index.php';
    
    $totalHalaman = ceil($totalData / $dataPerHalaman);
    if($totalHalaman <= 1) return;

    $range = 2; // jumlah nomor kiri-kanan yang tampil
    $ellipsisLeftShown = false;
    $ellipsisRightShown = false;

    // Gabungan extra params ke URL
    $queryParams = function($page) use ($extraParams) {
        return http_build_query(array_merge($extraParams, ['halaman' => $page])) ;
    };

    echo '<div class="pagination">';

    // Prev
    if($halamanAktif > 1) {
        echo '<a href="' .  $baseUrl . '?' . $queryParams($halamanAktif - 1 ) .'">&lt</a>';
    }

    // Nomor Halaman
    for ($i = 1; $i <= $totalHalaman; $i++) { 
        if($i == 1 || $i == $totalHalaman || ($i >= $halamanAktif - $range && $i <= $halamanAktif + $range) ) {
            echo '<a href="' . $baseUrl . '?' .  $queryParams($i) .'" ' . ($i === $halamanAktif ? 'style="font-weight:bold"' : '') .' >' . $i . '</a>';
        } else {
            if($i < $halamanAktif && !$ellipsisLeftShown) {
                $mid = floor(($halamanAktif - 1) / 2);
                echo '<a href="'. $baseUrl .'?' . $queryParams($mid) . '">...</a>';
                $ellipsisLeftShown = true;
            } elseif($i > $halamanAktif && !$ellipsisRightShown) {
                $mid = floor(($halamanAktif + $totalHalaman) / 2);
                echo '<a href="'. $baseUrl .'?' . $queryParams($mid) . '">...</a>';
                $ellipsisRightShown = true;
            }
        }
    }

    // Next
    if ($halamanAktif < $totalHalaman) {
        echo '<a href="' .  $baseUrl . '?' . $queryParams($halamanAktif + 1 ) .'">&gt</a>';
    }

    echo '</div>';
}

?>