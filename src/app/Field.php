<?php

namespace App;

abstract class Field
{
    protected string $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function render(): string;
    
}
