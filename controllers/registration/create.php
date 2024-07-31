<?php
use Classes\Session;

return view('registration/create.view.php', [
    'title' => 'Register',
    'emailError' => Session::get('email'),
    'passwordError' => Session::get('password')
]);