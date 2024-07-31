<?php
function dieDump($value) {

    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();

}
function basePath($path) {

    return BASE_PATH . $path;

}

function view($path, $attr = []) {

    extract($attr);

    require "views/{$path}";

}

function vendorAutoloader() {

    if (file_exists(basePath('vendor/autoload.php'))) {
        require_once basePath('vendor/autoload.php');
    }

}

function redirect($path) {

    header("Location: {$path}");
    die();

}

function old($key, $default = '') {

    return Classes\Session::get('_old')[$key] ?? $default;

}