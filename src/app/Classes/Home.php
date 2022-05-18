<?php

declare(strict_types=1);

namespace App\Classes;

class Home
{
    public function index(): string
    {
        $_SESSION['counter'] = ($_SESSION['counter'] ?? 0)+1;

        setcookie(
            'userName',
            'Bast',
            time()+10
        );
        
        return 'Home';
    }
}