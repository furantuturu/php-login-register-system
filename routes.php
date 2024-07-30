<?php

$router->get('/', 'index.php');
$router->get('/dashboard', 'dashboard.php');

//* Login
$router->get('/login', 'login/create.php');
$router->post('/login', 'login/store.php');

//* Register
$router->get('/register', 'registration/create.php');
$router->post('/register', 'registration/store.php');