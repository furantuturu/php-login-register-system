<?php

$router->get('/', 'index.php');
$router->get('/dashboard', 'dashboard.php')->only('auth');

//* Login
$router->get('/login', 'login/create.php')->only('guest');
$router->post('/login', 'login/store.php')->only('guest');

//* Register
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

//*Logout
$router->delete('/logout', 'logout.php')->only('auth');