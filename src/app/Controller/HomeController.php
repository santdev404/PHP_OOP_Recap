<?php

declare(strict_types=1);

namespace App\Controller;
use App\View;

class HomeController
{
    public function index()
    {
        return (string) View::make('index', ['foo'=>'bar']);
    }

    public function upload()
    {
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];

        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        echo '<pre>';
        var_dump(pathinfo($filePath));
        echo '<pre>';

    }


}