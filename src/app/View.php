<?php

declare(strict_types=1);

namespace App;
use App\Exceptions\ViewNotFoundException;

class View
{
    protected $view;
    protected $params;

    public function __construct(string $view, array $params = [])
    {
        $this->view = $view;
        $this->params = $params;
    }

    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    }

    public function render(): string
    {
        $viewPath = VIEW_PATH . '/' . $this->view .'.php';

        if(! file_exists($viewPath)){
            throw new ViewNotFoundException();
        }

        // foreach($this->params as $key => $value){
        //     $$key = $value;
        // }

        extract($this->params); 

        ob_start();
        include $viewPath;

        return (string) ob_get_clean();
    }

    public function __toString(): string
    {
        return $this->render();
    }


    public function __get($name)
    {
        return $this->params[$name] ?? null;
    }
}