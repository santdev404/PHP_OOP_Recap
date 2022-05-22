<?php

use App\App;
use App\Config;
use App\Controller\HomeController;
use App\Controller\InvoiceController;
use App\Router;
use App\View;

require_once __DIR__.'/../vendor/autoload.php';

// session_start();

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');


    $router = new Router();

    $router->get('/', [HomeController::class, 'index'])
        ->get('/download', [HomeController::class, 'download'])
        ->post('/upload', [HomeController::class, 'upload'])
        ->get('/invoices', [InvoiceController::class, 'index'])
        ->get('/invoices/create', [InvoiceController::class, 'create'])
        ->post('/invoices/create', [InvoiceController::class, 'store']);

     

// (new App(
//     $router, 
//     ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
//     [
//         'host' => $_ENV['DB_HOST'],
//         'user' => $_ENV['DB_USER'],
//         'pass' => $_ENV['DB_PASS'],
//         'database' => $_ENV['DB_DATABASE'],
//         'driver' => $_ENV['DB_DRIVER'] ?? 'mysql',

//     ]))->run();

(new App(
    $router, 
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    new Config($_ENV)))->run();