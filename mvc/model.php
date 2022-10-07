<?php

class Model
{
    public $string;

    public function __construct()
    {
        $this->string = "olá mundo..";
    }

    public function get_string()
    {
        return $this->string;
    }
}