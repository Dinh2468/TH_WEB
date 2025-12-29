<?php
spl_autoload_register(function ($classname) {
    //danh sach thu muc
    $classmap = [
        "database",
        "models"
    ];
    foreach ($classmap as $dir)
        if (file_exists(APP . '/' . $dir . '/' . $classname . '.class.php')) {
            require_once APP . '/' . $dir . '/' . $classname . '.class.php';
            return;
        }
});
