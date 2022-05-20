<?php

declare(strict_types=1);

namespace App\Controller;

use App\View;

class InvoiceController
{
    public function index()
    {
        return (string) View::make('invoices/index');
    }

    public function create()
    {
        return (string) View::make('invoices/create');
    }

    public function store(){
        return var_dump($_POST);
    }
}