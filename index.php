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


//EXO QCM ------------------------------------------------------------------------------------------------

//class Qcm
//{
//    /**
//     *
//     */
//    public function __construct()
//    {
//        $this->questions = array();
//        $this->appreciation = array();
//    }
//
//    /**
//     * @param Question $question
//     * @return $this
//     */
//    public function ajouterQuestions(Question $question): Qcm
//    {
//        $this->questions[] = $question;
//        return $this;
//    }
//
//    /**
//     * @param array $appreciation
//     * @return $this
//     */
//    public function setAppreciation(array $appreciation): Qcm
//    {
//        foreach ($appreciation as $key => $appr) {
//            if (is_numeric($key))
//                $this->appreciation[(int)$appr] = $appr;
//            else {
//                list($min, $max) = explode('-', $key);
//                if ($min > $max)
//                    list($min, $max) = array($max, $min);
//                for ($i = (int)$min; $i <= $max; $i++)
//                    $this->appreciation[$i] = $appr;
//            }
//        }
//        return $this;
//    }
//
//    /**
//     * Generer un formulaire de QCM
//     *
//     * @return string
//     */
//    public function generer(): string
//    {
//        // var_dump($_POST);
//        if (!empty($_POST)) {
//            $code = '';
//            $score = 0;
//            foreach ($_POST as $key => $value) {
//                $question = $this->questions[$key];
//                $reponse = $question->getReponse($value);
//                if ($reponse->getStatut() === Reponse::BONNE_REPONSE) {
//                    $code .= '<h2>Question ' . ($key + 1) . '</h2>
//                              <p><span style="color:green">Bonne reponse </span>: ' . $reponse->getReponse() . '</p>
//                              <p>' . $question->getExplication() . '</p>
//                              <hr>';
//                    $score++;
//                } else {
//                    $code .= '<h2>Question ' . ($key + 1) . '</h2>
//                              <p><span style="color:red">Mauvaise reponse </span>: ' . $reponse->getReponse() . '</p>
//                              <p>La bonne réponse : ' . $this->questions[$key]->getBonneReponse()->getReponse() . '<p/>
//                              <p>' . $question->getExplication() . '</p>
//                              <hr>';
//                }
//            }
//            $code .= 'Note : ' . $score = ($score / count($this->questions)) * 20;
//            $code .= $this->appreciation[$score];
//            return $code;
//        }
//        $code = '<form method="post" action=""><fieldset>';
//        foreach ($this->questions as $indexquestion => $question) {
//            $code .= '<h1>Question ' . ($indexquestion + 1)  . ' : ' . $question->getQuestion() . '</h1>';
//            foreach ($question->getReponses() as $index => $reponse) {
//                $code .= '<input type="radio" name="' . $indexquestion . '" value="' . $index . '">' . $reponse->getReponse() . '</input>';
//            }
//            $code .= '<hr>';
//        }
//        $code .= '<br><br><input type="submit" value="TESTER"></input>';
//        $code .= '</fieldset></form>';
//        return $code;
//    }
//}
//
///**
// *
// */
//class Question
//{
//    /**
//     * @var string
//     */
//    protected string $question;
//    /**
//     * @var array
//     */
//    protected array $reponses = [];
//    /**
//     * @var string
//     */
//    protected string $explication;
//
//    /**
//     * @param string $question
//     */
//    public function __construct(string $question)
//    {
//        $this->question = $question;
//    }
//
//    /**
//     * @param Reponse $reponse
//     * @return void
//     */
//    public function ajouterReponse(Reponse $reponse)
//    {
//        $this->reponses[] = $reponse;
//    }
//
//    /**
//     * @return array
//     */
//    public function getReponses(): array
//    {
//        return $this->reponses;
//    }
//
//    /**
//     * @param $explication
//     * @return void
//     */
//    public function setExplications($explication)
//    {
//        $this->explication = $explication;
//    }
//
//    /**
//     * @return string
//     */
//    public function getExplication()
//    {
//        return $this->explication;
//    }
//
//    /**
//     * @return string
//     */
//    public function getQuestion(): string
//    {
//        return $this->question;
//    }
//
//    /**
//     * @param int $index
//     * @return Reponse
//     */
//    public function getReponse(int $index): Reponse
//    {
//        return $this->reponses[$index];
//    }
//
//    /**
//     * @return int
//     */
//    public function getNumBonneReponse(): int
//    {
//        foreach ($this->reponses as $index => $reponse) {
//            if ($reponse->getStatut() == Reponse::BONNE_REPONSE) {
//                return $index;
//            }
//        }
//    }
//
//    /**
//     * @return Reponse
//     */
//    public function getBonneReponse(): Reponse
//    {
//        foreach ($this->reponses as $reponse) {
//            if ($reponse->getStatut() == Reponse::BONNE_REPONSE) {
//                return $reponse;
//            }
//        }
//    }
//}
//
///**
// *
// */
//class Reponse
//{
//    /**
//     *
//     */
//    const BONNE_REPONSE = true;
//    /**
//     *
//     */
//    const MAUVAISE_REPONSE = false;
//    /**
//     * @var string
//     */
//    private string $reponse;
//    /**
//     * @var bool|mixed
//     */
//    private bool $statut;
//
//
//    /**
//     * @param $reponse
//     * @param $statut
//     */
//    public function __construct($reponse, $statut = self::MAUVAISE_REPONSE)
//    {
//        $this->reponse = $reponse;
//        $this->statut = $statut;
//    }
//
//    /**
//     * @return string
//     */
//    public function getReponse()
//    {
//        return $this->reponse;
//    }
//
//    /**
//     * @return bool|mixed
//     */
//    public function getStatut()
//    {
//        return $this->statut;
//    }
//}
//
//$qcm = new Qcm();
//
//$question1 = new Question('Et paf, ça fait ...');
//$question1->ajouterReponse(new Reponse('Des mielpops'));
//$question1->ajouterReponse(new Reponse('Des chocapics', Reponse::BONNE_REPONSE));
//$question1->ajouterReponse(new Reponse('Des actimels'));
//$question1->setExplications('Et oui, la célèbre citation est « Et paf, ça fait des chocapics ! »');
//$qcm->ajouterQuestions($question1);
//
//$question2 = new Question('POO signifie');
//$question2->ajouterReponse(new Reponse('Php Orienté Objet'));
//$question2->ajouterReponse(new Reponse('ProgrammatiOn Orientée'));
//$question2->ajouterReponse(new Reponse('Programmation Orientée Objet', Reponse::BONNE_REPONSE));
//$question2->setExplications('Sans commentaires si vous avez eu faux :-°');
//$qcm->ajouterQuestions($question2);
//
//
//$qcm->setAppreciation(array(
//    '0-10' => 'Pas top du tout ...',
//    '10-20' => 'Très bien ...'
//));
//
//
//echo $qcm->generer();
//
//// echo '<pre>';
//// print_r($qcm);
//// echo '</pre>';





//EXO SPOTIFY ------------------------------------------------------------------------------------------------
trait NameTraint
{
    protected string $name;
    public function getName() : string {
        return $this->name;
    }
    public function setName(string $name) :void {
        $this->name = $name;
    }

}

class Song
{
    use NameTraint;
    private string $duree;
    private float $prix;
    private array $artistes = [];

    //SET --------------------
    public function setDuration(float $duree)
    {
        $this->duree = $duree;
    }
    public function setPrix(float $prix)
    {
        $this->prix = $prix;
    }
    public function setArtistes( string $artistes)
    {
        $this->artistes[] = $artistes;
    }

    //GET --------------------

    public function getDuree() {
        return $this->duree;
    }
    public function getPrix() {
        return $this->prix;
    }
    public function getArtistes() {
        return $this->artistes;
    }
}

class Albums
{
    use NameTraint;
    private int $dateSortie;
    private float $duree;
    private float $prixAlbum;
    private array $chansons = [];


//    public function __construct( string $nomAlbum, int $dateSortie, float $duree, float $prixAlbum, array $chansons){
//        $this->nomAlbum = $nomAlbum;
//        $this->dateSortie = $dateSortie;
//
//        $this->prixAlbum = $prixAlbum;
//        $this->chansons[] = $chansons;
//    }

    //SET --------------------
    public function setDateSortie(Int $dateSortie) {
        $this->dateSortie = $dateSortie;
    }
    public function setPrixAlbum(float $prixAlbum) {
        $this->prixAlbum = $prixAlbum;
    }
    public function setChansons(string $chansons) {
        $this->chansons[] = $chansons;
    }

    //GET --------------------
    public function getDateSortie() {
        return $this->dateSortie;
    }
    public function getPrixAlbum() {
        return $this->prixAlbum;
    }
    public function getChansons() {
        return $this->chansons;
    }
    public function getAlbumDuration() {

    }
}

class Artist
{
    use NameTraint;
    private string $nationality;
    private int $beginningYear;
    private array $albums = [];
    private string $style;

//    public function __construct(string $name, string $nationality, int  $beginningYear, string $albums, string $style)
//    {
//
//        $this->nationality = $nationality;
//        $this->beginningYear = $beginningYear;
//        $this->albums[] = $albums;
//        $this->style = $style;
//    }

    //SET --------------------
    public function setNationality( string $nationality) {
        $this->nationality = $nationality;
    }
    public function setBeginningYear ( int $beginningYear) {
        $this->beginningYear = $beginningYear;
    }
    public function setAlbums( string $albums) {
        $this->albums[] = $albums;
    }
    public function addStyle(string $style) {
        $this->style = $style;
    }

    //GET --------------------
    public function getNationality() {
        return $this->nationality;
    }
    public function getBeginningYear() {
        return $this->beginningYear;
    }
    public function getAlbums() {
        return $this->albums;
    }
    public function getStyle() {
        return $this->style;
    }

}

class Style
{
 //INSERER LE TRAIT name
    //SET --------------------

}

class User{

    use NameTraint;
    private int $birthDate;
    private int $age;

//    public function __construct(string $username, int $birthDate, int $age){
//        $this->username = $username;
//        $this->birthDate = $birthDate;
//        $this->age = $age;
//    }

    //SET --------------------

    public function setBirthDate(int $birthDate) {
        $this->birthDate = $birthDate;
    }
    public function setAge(int $age) {
        $this->age = $age;
    }

    //GET --------------------

    public function getBirthDate() {
        return $this->birthDate;
    }
    public function getAge() {
        return $this->age;
    }

}

class Playlist{

    use NameTraint;
    private DateTime $dateCreation;
    private DateTime $dateModification;

//    public function __construct(string $nomPlaylist, Int $dateCreation, Int $dateModification){
//
//        $this->nomPlaylist = $nomPlaylist;
//        $this->dateCreation = $dateCreation;
//        $this->dateModification = $dateModification;
//    }

    //SET --------------------
    public function setDateCreation(Int $dateCreation) {
        $this->dateCreation = $dateCreation;
    }
    public function setDateModification(Int $dateModification) {
        $this->dateModification = $dateModification;
    }

    //GET --------------------
    public function getDateCreation() {
        return $this->dateCreation;
    }
    public function getDateModification() {
        return $this->dateModification;
    }
}