<?php
use Classes\Session;

return view('login/create.view.php', [
    'title' => 'Login',
    'email' => Session::get('email')
]);