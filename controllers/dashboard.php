<?php
use Classes\Session;

return view('dashboard.view.php', [
    'title' => 'Dashboard',
    'user' => Session::get('user')
]);