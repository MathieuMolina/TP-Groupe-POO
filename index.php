<?php

class Form{

    private $action;
    private $method;
    private $class;
    private $legend;
    private $value;
    private $type;
    private $name;
    private $for;
    private $id;


    public function entete($action, $method, $class, $legend){
        $this->action = $action;
        $this->method = $method;
        $this->class = $class;
        $this->legend = $legend;

        echo '<form action=" '.  $this->action . '" method=" ' .$this->method . ' " class=" ' . $this->class . ' " >
                    <fieldset>
                        <legend> ' . $this->legend . '</legend>';
    }

    public function setSubmit($value){
        $this->value = $value;

        echo '<input type="submit" value=" ' . $this->value . '">
                </form>';
    }

    public function setText($type, $name, $for, $id){

    }
}




$form1 = new Form();
$form1->entete("index.php", "post", "", "Mon Formulaire");
$form1->setSubmit("Envoyer");