<?php

class Form{

    private $action;
    private $method;
    private $class;
    private $legend;
    private $value;

    public function entete($action, $method, $class, $legend){
        $this->action = $action;
        $this->method = $method;
        $this->class = $class;
        $this->legend = $legend;

        return '<form action=" '.  $this->action . '" method=" ' .$this->method . ' " class=" ' . $this->class . ' " >
                    <fieldset>
                        <legend> ' . $this->legend . '</legend>';
    }

    public function setSubmit($value){
        $this->value = $value;

        return '<input type="submit" value=" ' . $this->value . '">
                </form>';
    }
}

$form1 = new Form();
