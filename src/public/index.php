<?php

require __DIR__.'/../vendor/autoload.php';

session_start();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

$router = new App\Router;

$router->get('/', [App\Controller\HomeController::class, 'index'])
        ->post('/', [App\Controller\HomeController::class, 'upload'])
        ->get('/invoices', [App\Controller\InvoiceController::class, 'index'])
        ->get('/invoices/create', [App\Controller\InvoiceController::class, 'create'])
        ->post('/invoices/create', [App\Controller\InvoiceController::class, 'store']);



echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

