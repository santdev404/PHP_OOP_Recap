<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;
use App\DB;

class App
{

    protected $router;
    protected array $request;
    protected Config $config;
    private static DB $db;


    public function __construct(\App\Router $router, array $request, Config $config)
    {
        $this->router = $router;
        $this->request = $request;

        static::$db = new DB($config->db ?? []);

        // try{
        //     static::$db = new PDO(
        //         'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'],
        //         $_ENV['DB_USER'],
        //         $_ENV['DB_PASS']
        //     );

        //     static::$db = new PDO(
        //         $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['database'],
        //         $config['user'],
        //         $config['pass']
        //     );

            

        // }catch(\PDOException $e){
        //     throw new \PDOException($e->getMessage(), (int) $e->getCode());
        // }
    }


    public static function db()
    {
        return static::$db;
    }


    public function run()
    {
        try{
            echo $this->router->resolve(
                $this->request['uri'], 
                strtolower($this->request['method'])
            );
        } catch (RouteNotFoundException $e) {
            http_response_code(404);

            echo View::make('error/404');
        }

    }
}