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


trait TraitName
{

    /**
     * @var string
     */
    private string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Playlist|Album|Artist|Song|Style|TraitName|User
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

}

/**
 *
 */
class Song
{
    use TraitName;

    /**
     * @var string
     */
    private string $duration;

    /**
     * @var float
     */
    private float $price;

    /**
     * @var Artist[]
     */
    private array $artists;

    /**
     * @return string
     */
    public function getDuration(): string
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     */
    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return Artist[]
     */
    public function getArtists(): array
    {
        return $this->artists;
    }

    /**
     * @param Artist $artist
     */
    public function addArtists(Artist $artist): void
    {
        if (!in_array($artist, $this->artists)) {
            $this->artists[] = $artist;
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->name . ' (' . $this->duration . ')';
    }

    /**
     * @return string
     */
    public function getIntDuration(): string
    {
        return $this->duration;
        // chaine initiale : '00:01:50'
        // $explodedDuration[] = ['00', '01', '50']
//        $explodedDuration = explode(':', $this->duration);
//        return
//            ($explodedDuration[0] * 3600)
//            + ($explodedDuration[1] * 60)
//            + $explodedDuration[2];
    }

}

/**
 *
 */
class Album
{
    use TraitName;

    /**
     * @var int
     */
    private int $releasedYear;

    /**
     * @var float
     */
    private float $price;

    /**
     * @var Song[]
     */
    private array $songs;

    /**
     * Album constructor.
     */
    public function __construct()
    {
        $this->songs = [];
    }

    /**
     * @return int
     */
    public function getReleasedYear(): int
    {
        return $this->releasedYear;
    }

    /**
     * @param int $releasedYear
     */
    public function setReleasedYear(int $releasedYear): void
    {
        $this->releasedYear = $releasedYear;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return Song[]
     */
    public function getSongs(): array
    {
        return $this->songs;
    }

    /**
     * @param Song $song
     */
    public function addSong(Song $song): void
    {
        if (!in_array($song, $this->songs)) {
            $this->songs[] = $song;
        }
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getAlbumDuration(): string
    {
        $totalDuration = new DateTime('00:00:00');
        foreach ($this->songs as $song) {
            $d = $this->time_to_interval($song->getIntDuration());
            $totalDuration->add($d);
        }
        return $totalDuration->format('H:i:s');

//        $totalDuration = 0;
//        foreach ($this->songs as $song) {
//            $totalDuration += $song->getIntDuration();
//        }
//        $seconds = $totalDuration % 60;
//        $minutes = floor($totalDuration / 60);
//        $minutes = $minutes % 60;
//        $hours = floor($minutes / 60);
//        $hours = $hours % 60;
//        if ($minutes < 10) {
//            $minutes = '0' . $minutes;
//        }
//        if ($hours < 10) {
//            $hours = '0' . $hours;
//        }
//        if ($seconds < 10) {
//            $seconds = '0' . $seconds;
//        }
//        return $hours . ':' . $minutes . ':' . $seconds;
    }

    /**
     * @throws Exception
     */
    public function time_to_interval(string $time): DateInterval
    {
        $parts = explode(':',$time);
        return new DateInterval('PT'.$parts[0].'H'.$parts[1].'M'.$parts[2].'S');
    }
}

/**
 *
 */
class Artist
{

    use TraitName;

    /**
     * @var Style[]
     */
    private array $styles;

    /**
     * @var string
     */
    private string $nationality;

    /**
     * @var int
     */
    private int $beginningYear;

    /**
     * Artist constructor.
     *
     * Un constructeur permet de définir un comportement à l'instanciation de l'objet
     */
    public function __construct()
    {
        $this->styles = [];
    }

    /**
     * @return string
     */
    public function getNationality(): string
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     * @return Artist
     */
    public function setNationality(string $nationality): Artist
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * @return int
     */
    public function getBeginningYear(): int
    {
        return $this->beginningYear;
    }

    /**
     * @param int $beginningYear
     * @return Artist
     */
    public function setBeginningYear(int $beginningYear): Artist
    {
        $this->beginningYear = $beginningYear;

        return $this;
    }

    /**
     * @return array|Style[]
     */
    public function getStyles(): array
    {
        return $this->styles;
    }

    /**
     * @param Style $style
     * @return $this
     */
    public function addStyle(Style $style): Artist
    {
        // Si le Style en paramètre n'existe pas dans le tableau
        // Alors on l'ajoute
        if (!in_array($style, $this->styles)) {
            $this->styles[] = $style;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->name . ' - ' . $this->beginningYear . ' (' . $this->nationality . ')';
    }

}

/**
 *
 */
class Style
{
    use TraitName;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }

}

class User{

    use TraitName;
    private int $birthDate;
    private int $age;

    /**
     * @return int
     */
    public function getBirthDate(): int
    {
        return $this->birthDate;
    }

    /**
     * @param int $birthDate
     */
    public function setBirthDate(int $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

}

/**
 *
 */
class Playlist
{

    /**
     * Import le trait dans la classe, ainsi la classe bénéficie
     * des attributs du trait
     */
    use TraitName;

    /**
     * @var DateTime
     */
    private DateTime $createdAt;

    /**
     * @var DateTime
     */
    private DateTime $updatedAt;

    /**
     * @var Song[]
     */
    private array $songs;

    /**
     * Playlist constructor.
     */
    public function __construct()
    {
        // PAr défaut new DateTime vous donne la date du jour
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
        $this->updatedAt = new DateTime();
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @return Song[]
     */
    public function getSongs(): array
    {
        return $this->songs;
    }

    /**
     * @param Song $song
     */
    public function addSong(Song $song): void
    {
        if (!in_array($song, $this->songs)) {
            $this->songs[] = $song;
            $this->updatedAt = new DateTime();
        }
    }

}


// Template --------------------------------

$style1 = new Style();
$style1->setName('Heavy metal');
$style2 = new Style();
$style2->setName('Trash metal');
$style3 = new Style();
$style3->setName('Hard rock');

echo $style1->getName();

$song1 = new Song( 'Fight fire with fire');
var_dump($song1->getArtists());


/// Création des artistes \\\\\
$artist = (new Artist());
$artist->setBeginningYear(1981);
$artist->setNationality('American');
$artist->setName('Metallica');
//$artist->addStyle($style1);
//$artist->addStyle($style2);
//$artist->addStyle($style3);


//$song = new Song();
//$song->setDuration('00:06:37');
//
//$song1 = new Song();
//$song1->setDuration('00:04:45');
//
//$album = new Album();
//$album->addSong($song);
//$album->addSong($song1);
//
//echo $album->getAlbumDuration();
//echo '<br>';
//
//$user = new User();
//$date = (new DateTime())
//    ->setDate(1990, 1, 1);
//$user->setBirthDate($date);
//echo $user->getAge();
//
//echo '<br>';
//
//echo $artist;
//echo '<ul>';
//foreach ($artist->getStyles() as $style) {
//    echo '<li>';
//    echo $style;
//    echo '</li>';
//}
//echo '</ul>';