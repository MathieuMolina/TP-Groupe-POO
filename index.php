<?php

class Form{

    private $action;
    private $method;
    private $class;

    public function __construct($action, $method, $class){
        $this->action = $action;
        $this->method = $method;
        $this->class = $class;
    }
}