<?php

//EXO4

/**
 * Classe pour generer un formulaire
 */
class Form
{

    /**
     * @var string
     */
    protected string $textForm;

    /**
     * @param string $action
     * @param string $method
     * @param string $class
     * @param string $legend
     */
    public function __construct(string $action, string $method, string $class, string $legend)
    {
        $this->textForm =
            '<form action=" ' . $action . '" method=" ' . $method . ' " class=" ' . $class . ' " >
        <fieldset>
        <legend> ' . $legend . '</legend>';
    }

    /**
     * @param string $type
     * @param string $name
     * @param string $for
     * @param string $id
     * @return void
     */
    public function setText(string $type, string $name, string $for, string $id): void
    {
        $this->textForm .=

            '<label for="' . $for . '">Entrez votre ' . $name . '</label>
        <input type="' . $type . '" name="' . $name . '" id=" ' . $id . ' ">
        <br><br>
        ';
    }

    /**
     * @param string $value
     * @return void
     */
    public function setSubmit(string $value) : void
    {
        $this->textForm .=

            '<input type="submit" value=" ' . $value . '">
        </form>';
    }

    /**
     * @return string
     */
    public function getForm(): string
    {
        return $this->textForm;
    }

}


//$form1 = new Form("index.php", "post", "", "Mon Formulaire");
//$form1->setText("text", "prenom", "prenom", "prenom");
//$form1->setText("text", "nom", "nom", "nom");
//$form1->setText("email", "email", "email", "email");
//$form1->setSubmit("Envoyer");
//echo $form1->getForm();




//EXO 5: ----------------------------------------------------------

class Form2 extends Form
{

    public function setInput(string $name, string $id, string $type)
    {
        $this->textForm .=


            '<input type="'. $type . '" id="' . $id . '" name="' . $name . '">
            <label for="' . $id . '">' . $id . '</label>';
    }
}

$form1 = new Form("index.php", "post", "", "Mon Formulaire");
$form1->setText("text", "prenom", "prenom", "prenom");
$form1->setText("text", "nom", "nom", "nom");
$form1->setText("email", "email", "email", "email");
echo $form1->getForm();

$form2 = new Form2("index.php", "post", "", "Choix");

$form2->setInput("sexe", "feminin", "radio");
$form2->setInput("sexe", "masculin", "radio");
$form2->setInput("matiere", "Phylosophie", "checkbox");
$form2->setInput("matiere", "Mathématiques", "checkbox");
$form2->setSubmit("Envoyer");
echo $form2->getForm();