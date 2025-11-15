<?php
// Autoload semua model dan controller
spl_autoload_register(function($class) {
    $paths = [
        BASE_PATH . '/app/controller/' . $class . '.php',
        BASE_PATH . '/app/model/' . $class . '.php'
    ];

    foreach ($paths as $file) {
        if(file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

?>