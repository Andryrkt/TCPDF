<?php

namespace App\Controller;

class BadmController extends Controller
{

    public function formBadm()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            var_dump($_POST);
            $dateDemande = $this->getDatesystem();
            $this->twig->display('badm/formCompleBadm.html.twig');
        } else {
            $this->twig->display('badm/formBadm.html.twig');
        }
    }

    public function formCompleBadm()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $jsonsata = file_get_contents("php://input");
            $data = json_decode($jsonsata, true);
            $Num_BDM = $this->autoINcriment('BDM');



            // $generPdfBadm = [
            //     'NUM_BDM' => $Num_BDM,
            //     'Date_Demande' => ,
            //     'Designation' => ,
            //     'Num_ID' => ,
            //     'Num_Serie' => ,
            //     'Groupe' => ,
            //     'Num_Parc' => ,
            //     'Constructeur' => ,
            //     'Date_Achat' => ,
            //     'Annee_Model' => ,
            //     'Modele' => ,
            //     'Agence_Service_Emetteur' => ,
            //     'Casier_Emetteur' => ,
            //     'Agence_Service_Destinataire' => ,
            //     'Casier_Destinataire' => ,
            //     'Motif_Arret_Materiel' => ,
            //     'Etat_Achat' => ,
            //     'Date_Mise_Location' => ,
            //     'Cout_Acquisition' => ,
            //     'Amort' => ,
            //     'VNC' => ,
            //     'Nom_Client' => ,
            //     'Modalite_Paiement' => ,
            //     'Prix_HT' => ,
            //     'Motif_Mise_Rebut' => ,
            //     'Heures_Machine' => ,
            //     'Kilometrage' => ,
            //     'Email_Emetteur' => ,
            //     'Agence_Service_Emetteur_Non_separer' => 
            // ];
            // $this->genererPdf->genererPdfBadm($generPdfBadm);
            if (!empty($data)) {
                $tab = [
                    "message" => $jsonsata
                ];
            } else {
                $tab = [
                    "message" => 'zero données'
                ];
            }


            echo json_encode($tab);
        }
    }
}
