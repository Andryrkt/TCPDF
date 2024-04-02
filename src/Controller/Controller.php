<?php

namespace  App\Controller;


use GenererPdf;
use App\Model\BadmModel;
use App\Model\PdoOdbcModel;
use App\Model\OdbcCrudModel;



class Controller
{
    protected $loader;
    protected $twig;
    protected $badm;
    protected $genererPdf;
    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'resource/template');
        $this->twig = new \Twig\Environment($this->loader, ['debug' => true]);
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
        $this->badm = new BadmModel();
        $this->genererPdf = new GenererPdf();
    }

    /**
     * Date Système
     */
    public function getDatesystem()
    {
        $d = strtotime("now");
        $Date_system = date("Y-m-d", $d);
        return $Date_system;
    }
    /**
     * Incrimentation de Numero_DOM (DOMAnnéeMoisNuméro)
     */
    public function autoINcriment(string $nomDemande)
    {
        //NumDOM auto
        $YearsOfcours = date('y'); //24
        $MonthOfcours = date('m'); //01
        $AnneMoisOfcours = $YearsOfcours . $MonthOfcours; //2401
        var_dump($AnneMoisOfcours);
        // dernier NumDOM dans la base
        //$Max_Num = $this->badm->RecupereNumDom('Numero_Demande_BADM');
        $Max_Num = 'BDM24040004';
        //num_sequentielless
        $vNumSequential =  substr($Max_Num, -4); // lay 4chiffre msincrimente
        var_dump($vNumSequential);
        $DateAnneemoisnum = substr($Max_Num, -8);
        var_dump($DateAnneemoisnum);
        $DateYearsMonthOfMax = substr($DateAnneemoisnum, 0, 4);
        var_dump($DateYearsMonthOfMax);
        if ($DateYearsMonthOfMax == $AnneMoisOfcours) {
            $vNumSequential =  $vNumSequential + 1;
        } else {
            if ($AnneMoisOfcours > $DateYearsMonthOfMax) {
                $vNumSequential = 1;
            }
        }
        var_dump($vNumSequential);
        $Result_Num = $nomDemande . $AnneMoisOfcours . $this->CompleteChaineCaractere($vNumSequential, 4, "0", "G");
        return $Result_Num;
    }

    function CompleteChaineCaractere($ChaineComplet, $LongerVoulu, $Caracterecomplet, $PositionComplet)
    {
        for ($i = 1; $i < $LongerVoulu; $i++) {
            if (strlen($ChaineComplet) < $LongerVoulu) {
                if ($PositionComplet = "G") {
                    $ChaineComplet = $Caracterecomplet . $ChaineComplet;
                } else {
                    $ChaineComplet = $Caracterecomplet . $Caracterecomplet;
                }
            }
        }
        return $ChaineComplet;
    }
}
