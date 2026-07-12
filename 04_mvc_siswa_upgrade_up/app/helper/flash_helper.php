<?php
function renderFlashMassage($msg) {
    if (is_array($msg)) {
        echo "<ul>";
        foreach ($msg as $m) {
            echo "<li>" . htmlspecialchars($m) . "</li>";
        }
        echo "</ul>";
    } else {
        echo htmlspecialchars($msg);
    }
}

?>