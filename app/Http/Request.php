<?php

namespace App\Http;

class Request{
    protected $segments = [];   
    protected $controller;
    protected $method;

    public function __construct(){
        //platzi.test/servicios/index
        $this->segments = explode("/", $_SERVER["REQUEST_URI"]);

        $this->setController();
        $this->setMethod();
    }

    public function setController(){
        $this->controller = empty($this->segments[1])
        ? 'home'
        : $this->segments[1];
    }

    public function setMethod(){
        $this->method = empty($this->segments[2])
        ? 'index'
        : $this->segments[2];   
    }


    public function getController(){
        $controller =  ucfirst($this->controller);
        return "App\Http\Controllers\\{$controller}Controller";
    }

    public function getMethod(){
        return $this->method;
    }

    public function send(){
        $controller = $this->getController();
        $method = $this->getMethod();   

        $response = call_user_func([
            new $controller,
            $method
        ]);

        $response->send();
    }
}