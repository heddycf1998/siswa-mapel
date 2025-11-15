<?php

use CodeIgniter\Pager\Pager;

/**
 * Custom Pagination Generator
 *
 * @param Pager $pager
 * @param string $group
 * @return string
 */
function custom_pagination(Pager $pager, string $group = 'default'): string
{
    $page      = $pager->getCurrentPage($group);
    $totalPage = $pager->getPageCount($group);

    if ($totalPage <= 1) return ''; // Kalau cuma 1 halaman, gak usah tampilkan apa-apa

    $html = '<div class="pagination">';

    // Prev
    if ($page > 1) {
        $html .= '<a href="' . $pager->getPreviousPageURI($group) . '">Prev</a>';
    }

    // Range logic (5 page range)
    $start = max(1, $page - 2);
    $end   = min($totalPage, $page + 2);

    if ($start > 1) {
        $html .= '<a href="' . $pager->getPageURI(1, $group) . '">1</a>';
        if ($start > 2) $html .= '<span>...</span>';
    }

    for ($i = $start; $i <= $end; $i++) {
        if ($i == $page) {
            $html .= '<span class="active">' . $i . '</span>';
        } else {
            $html .= '<a href="' . $pager->getPageURI($i, $group) . '">' . $i . '</a>';
        }
    }

    if ($end < $totalPage) {
        if ($end < $totalPage - 1) $html .= '<span>...</span>';
        $html .= '<a href="' . $pager->getPageURI($totalPage, $group) . '">' . $totalPage . '</a>';
    }

    // Next
    if ($page < $totalPage) {
        $html .= '<a href="' . $pager->getNextPageURI($group) . '">Next</a>';
    }

    return $html . '</div>';
}
