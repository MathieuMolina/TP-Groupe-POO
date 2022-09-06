<?php

//EXO4
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
    private $textForm;

    public function __construct($action, $method, $class, $legend){
        $this->action = $action;
        $this->method = $method;
        $this->class = $class;
        $this->legend = $legend;
        $this->textForm =

         '<form action=" '.  $this->action . '" method=" ' .$this->method . ' " class=" ' . $this->class . ' " >
        <fieldset>
        <legend> ' . $this->legend . '</legend>';
    }

    public function setText($type, $name, $for, $id){
        $this->type = $type;
        $this->name = $name;
        $this->for = $for;
        $this->id = $id;
        $this->textForm .=

        '<label for="' . $this->for . '">Entrez votre ' . $this->name . '</label>
        <input type="' . $this->type . '" name="'.$this->name.'" id=" '. $this->id .' ">
        <br><br>
        ';
    }

    public function setSubmit($value){
        $this->value = $value;
        $this->textForm .=

        '<input type="submit" value=" ' . $this->value . '">
        </form>';
    }

    public function getForm()
    {
        echo $this->textForm;
    }

}




$form1 = new Form("index.php", "post", "", "Mon Formulaire");
$form1->setText("text", "prenom", "prenom", "prenom");
$form1->setText("text", "nom", "nom", "nom");
$form1->setText("email", "email", "email", "email");
$form1->setSubmit("Envoyer");
$form1->getForm();
