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
//$form2->setInput("sexe", "feminin", "radio", "F??minin");
//$form2->setInput("sexe", "masculin", "radio", "Masculin");
//$form2->setInput("matiere[]", "phylosophie", "checkbox", "Phylosophie");
//$form2->setInput("matiere[]", "mathematiques", "checkbox", "Math??matiques");
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
//                              <p>La bonne r??ponse : ' . $this->questions[$key]->getBonneReponse()->getReponse() . '<p/>
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
//$question1 = new Question('Et paf, ??a fait ...');
//$question1->ajouterReponse(new Reponse('Des mielpops'));
//$question1->ajouterReponse(new Reponse('Des chocapics', Reponse::BONNE_REPONSE));
//$question1->ajouterReponse(new Reponse('Des actimels'));
//$question1->setExplications('Et oui, la c??l??bre citation est ?? Et paf, ??a fait des chocapics ! ??');
//$qcm->ajouterQuestions($question1);
//
//$question2 = new Question('POO signifie');
//$question2->ajouterReponse(new Reponse('Php Orient?? Objet'));
//$question2->ajouterReponse(new Reponse('ProgrammatiOn Orient??e'));
//$question2->ajouterReponse(new Reponse('Programmation Orient??e Objet', Reponse::BONNE_REPONSE));
//$question2->setExplications('Sans commentaires si vous avez eu faux :-??');
//$qcm->ajouterQuestions($question2);
//
//
//$qcm->setAppreciation(array(
//    '0-10' => 'Pas top du tout ...',
//    '10-20' => 'Tr??s bien ...'
//));
//
//
//echo $qcm->generer();
//
//// echo '<pre>';
//// print_r($qcm);
//// echo '</pre>';





//EXO SPOTIFY ------------------------------------------------------------------------------------------------

/**
 *
 */
trait NameTrait
{
    protected string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}

class Song
{
    use NameTrait;
    private string $duration;
    // private array $artists = array();

    public function __construct(string $name)
    {
        $this->name = $name;
    }



    public function getDuration(): string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
    }

    public function getArtists(): array
    {
        return $this->artists;
    }

    public function setArtists(array $artists): void
    {
        $this->artists = $artists;
    }
}

class Album
{
    use NameTrait;

    private int $date;
    private string $duration;
    private float $price;
    private array $songs = array();

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addSong(Song $name): Album
    {
        $this->songs[] = $name;
        return $this;
    }

    public function getDuration(): string
    {
        $duration = new DateTime('00:00:00');
        foreach ($this->songs as $song) {
            $d = $this->time_to_interval($song->getDuration());
            $duration->add($d);
        }
        return $duration->format('H:i:s');
    }

    public function time_to_interval($time): DateInterval
    {
        $parts = explode(':', $time);
        return new DateInterval('PT' . $parts[0] . 'H' . $parts[1] . 'M' . $parts[2] . 'S');
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getSongs(): array
    {
        return $this->songs;
    }

    public function setSongs(array $songs): void
    {
        $this->songs = $songs;
    }
}

class Artist
{
    use NameTrait;
    private string $nationality;
    private int $beginningYear;
    private array $albums = [];
    private array $styles = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addAlbum(Album $name): Artist
    {
        $this->albums[] = $name;
        return $this;
    }

    public function addStyle(Style $name): Artist
    {
        $this->styles[] = $name;
        return $this;
    }

    public function __toString(): string
    {
        return $this->name . ' - ' . $this->beginningYear . ' (' . $this->nationality . ')';
    }

    public function getNationality(): string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): void
    {
        $this->nationality = $nationality;
    }

    public function getBeginningYear(): int
    {
        return $this->beginningYear;
    }

    public function setBeginningYear(int $beginningYear): void
    {
        $this->beginningYear = $beginningYear;
    }

    public function getAlbums(): array
    {
        return $this->albums;
    }

    public function setAlbums(array $albums): void
    {
        $this->albums = $albums;
    }

    public function getStyles(): array
    {
        return $this->styles;
    }

    public function setStyle(string $style): void
    {
        $this->style = $style;
    }
}

class Style
{
    use NameTrait;

    public function __toString(): string
    {
        return $this->name;
    }
}

class User{

    use NameTrait;
    private datetime $birthDate;
    private int $age;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setBirthDate(datetime $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function getAge(): int
    {
        $now = (int)(new DateTime())->format('Y');
        return ($now - (int)($this->birthDate->format('Y')));
    }
}




///// Cr??ation des styles \\\\\
$style1 = new Style();
$style1->setName('Heavy metal');
$style2 = new Style();
$style2->setName('Trash metal');
$style3 = new Style();
$style3->setName('Hard rock');

// ///// Cr??ation des artistes \\\\\
// $artist = (new Artist())
//     ->setBeginningYear(1981)
//     ->setNationality('American')
//     ->addStyle($style1)
//     ->addStyle($style2)
//     ->addStyle($style3)
//     ->setName('Metallica');

$song = new Song('Fade to black');
$song->setDuration('00:06:57');

$song1 = new Song('Trapped under ice');
$song1->setDuration('00:04:24');

$song2 = new Song('	Hit the Lights');
$song2->setDuration('00:04:17');

$song3 = new Song('	The Four Horsemen');
$song3->setDuration('00:07:13');



$album = new Album('Ride the lightning');
$album->addSong($song);
$album->addSong($song1);
$album->setDate(1984);
$album->setPrice(139.90);
$album->setDuration($album->getDuration());

echo $album->getDuration();
echo '<br />';

$album1 = new Album('Kill\'em All');
$album1->addSong($song2);
$album1->addSong($song3);
$album1->setDate(1983);
$album1->setPrice(119.90);
$album1->setDuration($album->getDuration());

$artist = new Artist('Metallica');
$artist->addAlbum($album);
$artist->addAlbum($album1);
$artist->addStyle($style1);
$artist->addStyle($style2);
$artist->addStyle($style3);
$artist->setNationality('American');
$artist->setBeginningYear(1981);

$user = new User('Julien');
$date = (new DateTime())
    ->setDate(1990, 1, 1);
$user->setBirthDate($date);
echo $user->getAge();


// var_dump($artist);
echo '<br>';
echo ($artist);
echo '<ul>';
foreach ($artist->getStyles() as $style) {
    echo '<li>';
    echo $style;
    echo '</li>';
}
echo '</ul>';
