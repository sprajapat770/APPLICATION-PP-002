<?php

namespace App\Classes;

class Home
{
    public function index(): string
    {
        $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;
        setcookie(
            'userName',
            'Gio',
            time() + 10,
            '/',
            '',
            false,
            false
        );
        return 'Home';
    }
}

?>