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

try {
    $router = new Router();

    $router->get('/', [HomeController::class, 'index'])
        ->get('/download', [HomeController::class, 'download'])
        ->post('/upload', [HomeController::class, 'upload'])
        ->get('/invoices', [InvoiceController::class, 'index'])
        ->get('/invoices/create', [InvoiceController::class, 'create'])
        ->post('/invoices/create', [InvoiceController::class, 'store']);

    echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
}catch(\App\Exceptions\RouteNotFoundException $e)
{
        // header('HTTP/1.1 404 Not Found');
        http_response_code(404);
        echo View::make('error/404');
}      