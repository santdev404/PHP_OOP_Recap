<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Invoice;
use App\Model\User;
use App\Model\SignUp;
use App\View;
use PDO;

class HomeController
{
    public function index()
    {   

        $email = 'santdev106@gmail.com';
        $name = 'sant dev';
        $amount = 25;
        $invoiceModel = new Invoice();
  
        $userModel = new User();

        

        $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
            [
                'email' => $email,
                'name' => $name
            ],
            [
                'amount' => $amount
            ]
        );

        return (string) View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
    }

    public function download()
    {
        header('Content-Type: application/jpeg');
        header('Content-Disposition: attachment;filename="perico2.jpeg"');
        readfile(STORAGE_PATH. '/perico.jpeg');
    }

    public function upload()
    {
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        // echo '<pre>';
        // var_dump(pathinfo($filePath));
        // echo '<pre>';
        header('Location: /');
        exit;

    }


}