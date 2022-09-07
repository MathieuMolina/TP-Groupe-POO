<?php

//EXO4 ----------------------------------------------------------------

/**
 * Classe pour generer un formulaire
 */
//class Form
//{
//
//    /**
//     * @var string
//     */
//    protected string $textForm;
//
//    /**
//     * @param string $action
//     * @param string $method
//     * @param string $class
//     * @param string $legend
//     */
//    public function __construct(string $action, string $method, string $class, string $legend)
//    {
//        $this->textForm =
//            '<form action="' . $action . '" method="' . $method . '" class=" ' . $class . ' " >
//        <fieldset>
//        <legend> ' . $legend . '</legend>';
//    }
//
//    /**
//     * @param string $type
//     * @param string $name
//     * @param string $for
//     * @param string $id
//     * @return void
//     */
//    public function setText(string $type, string $name, string $for, string $id): void
//    {
//        $this->textForm .=
//
//            '<label for="' . $for . '">Entrez votre ' . $name . '</label>
//        <input type="' . $type . '" name="' . $name . '" id=" ' . $id . ' ">
//        <br><br>
//        ';
//    }
//
//    /**
//     * @param string $value
//     * @return void
//     */
//    public function setSubmit(string $value) : void
//    {
//        $this->textForm .=
//
//            '<input type="submit" value=" ' . $value . '">
//        </form>';
//    }
//
//    /**
//     * @return string
//     */
//    public function getForm(): string
//    {
//        return $this->textForm;
//    }
//
//}


//$form1 = new Form("index.php", "post", "", "Mon Formulaire");
//$form1->setText("text", "prenom", "prenom", "prenom");
//$form1->setText("text", "nom", "nom", "nom");
//$form1->setText("email", "email", "email", "email");
//$form1->setSubmit("Envoyer");
//echo $form1->getForm();




//EXO 5: ----------------------------------------------------------

//class Form2 extends Form
//{
//    public function setInput(string $name, string $id, string $type, string $label = ''): void
//    {
//        $this->textForm .=
//            '<input type="'. $type . '" id="' . $id . '" name="' . $name . '" value="'. $id . '">
//            <label for="' . $id . '">' . $label . '</label>';
//    }
//}
//
//
//
//$form2 = new Form2("index.php", "post", "", "Choix");
//$form2->setText("text", "prenom", "prenom", "prenom");
//$form2->setInput("sexe", "feminin", "radio", "Féminin");
//$form2->setInput("sexe", "masculin", "radio", "Masculin");
//$form2->setInput("matiere[]", "phylosophie", "checkbox", "Phylosophie");
//$form2->setInput("matiere[]", "mathematiques", "checkbox", "Mathématiques");
//$form2->setSubmit("Envoyer");
//echo $form2->getForm();
//
//var_dump($_POST);


//EXO QCM ----------------------------------------------------------------






class Qcm
{
    public function __construct()
    {
        $this->questions = array();
        $this->appreciation = array();
    }

    public function ajouterQuestions(Question $question) : Qcm
    {
        $this->questions[] = $question;
        return $this;
    }

    public function setAppreciation(array $appreciation) : Qcm
    {
        foreach ($appreciation as $key => $appr) {
            if (is_numeric($key))
                $this->appreciation[(int)$appr] = $appr;
            else {
                list($min, $max) = explode('-', $key);
                if ($min > $max)
                    list($min, $max) = array($max, $min);
                for ($i = (int)$min; $i <= $max; $i++)
                    $this->appreciation[$i] = $appr;
            }
        }
        return $this;
    }

    public function generer(): string
    {
        // var_dump($_POST);
        if (!empty($_POST)) {
            $code = '';
            foreach ($_POST as $key => $value) {
                $question = $this->questions[$key];
                $reponse = $question->getReponse($value);
                if ($reponse->getStatut() == Reponse::BONNE_REPONSE) {
                    $code .= '<p>Bonne reponse : ' . $reponse->getReponse() . '</p>';
                } else {
                    $code .= '<p>Mauvaise reponse : ' . $reponse->getReponse() . '<br>' .
                        'La bonne reponse : ' . $this->questions[$key]->getBonneReponse()->getReponse() . '<br/><br/>' .
                        $question->getExplication() . '</p>';
                }
            }
            return $code;
        }
        $code = '<form method="post" action=""><fieldset>';
        foreach ($this->questions as $indexquestion => $question) {
            $code .= '<h1>Question ' . ($indexquestion + 1)  . ' : ' . $question->getQuestion() . '</h1>';
            foreach ($question->getReponses() as $index => $reponse) {
                $code .= '<input type="radio" name="' . $indexquestion . '" value="' . $index . '">' . $reponse->getReponse() . '</input>';
            }
        }
        $code .= '<br><br><input type="submit" value="TESTER"></input>';
        $code .= '</fieldset></form>';
        return $code;
    }
}

class Question
{
    protected string $question;
    protected array $reponses = [];
    protected string $explication;

    public function __construct(string $question)
    {
        $this->question = $question;
    }

    public function ajouterReponse(Reponse $reponse)
    {
        $this->reponses[] = $reponse;
    }
    public function getReponses(): array
    {
        return $this->reponses;
    }

    public function setExplications($explication)
    {
        $this->explication = $explication;
    }
    public function getExplication()
    {
        return $this->explication;
    }
    public function getQuestion(): string
    {
        return $this->question;
    }
    public function getReponse(int $index): Reponse
    {
        return $this->reponses[$index];
    }
    public function getNumBonneReponse(): int
    {
        foreach ($this->reponses as $index => $reponse) {
            if ($reponse->getStatut() == Reponse::BONNE_REPONSE) {
                return $index;
            }
        }
    }
    public function getBonneReponse(): Reponse
    {
        foreach ($this->reponses as $reponse) {
            if ($reponse->getStatut() == Reponse::BONNE_REPONSE) {
                return $reponse;
            }
        }
    }
}

class Reponse
{
    const BONNE_REPONSE = true;
    const MAUVAISE_REPONSE = false;
    private string $reponse;
    private bool $statut;


    public function __construct($reponse, $statut = self::MAUVAISE_REPONSE)
    {
        $this->reponse = $reponse;
        $this->statut = $statut;
    }

    public function getReponse()
    {
        return $this->reponse;
    }
    public function getStatut()
    {
        return $this->statut;
    }
}

$qcm = new Qcm();

$question1 = new Question('Et paf, ça fait ...');
$question1->ajouterReponse(new Reponse('Des mielpops'));
$question1->ajouterReponse(new Reponse('Des chocapics', Reponse::BONNE_REPONSE));
$question1->ajouterReponse(new Reponse('Des actimels'));
$question1->setExplications('Et oui, la célèbre citation est « Et paf, ça fait des chocapics ! »');
$qcm->ajouterQuestions($question1);

$question2 = new Question('POO signifie');
$question2->ajouterReponse(new Reponse('Php Orienté Objet'));
$question2->ajouterReponse(new Reponse('ProgrammatiOn Orientée'));
$question2->ajouterReponse(new Reponse('Programmation Orientée Objet', Reponse::BONNE_REPONSE));
$question2->setExplications('Sans commentaires si vous avez eu faux :-°');
$qcm->ajouterQuestions($question2);


$qcm->setAppreciation(array('0-10' => 'Pas top du tout ...',
    '10-20' => 'Très bien ...'));


echo $qcm->generer();

echo $qcm->generer();
echo '<pre>';
print_r($qcm);
echo '</pre>';
