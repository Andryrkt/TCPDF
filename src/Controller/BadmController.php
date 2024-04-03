<?php

namespace App\Controller;

class BadmController extends Controller
{

    public function formBadm()
    {
         
        $this->SessionStart();
        $UserConnect = $_SESSION['user'];
        $Servofcours = $this->DomModel->getserviceofcours($_SESSION['user']);
        $LibServofCours = $this->DomModel->getLibeleAgence_Service($Servofcours);


        $Code_AgenceService_Sage = $this->DomModel->getAgence_SageofCours($_SESSION['user']);
        $CodeServiceofCours = $this->DomModel->getAgenceServiceIriumofcours($Code_AgenceService_Sage, $_SESSION['user']);
        $PersonelServOfCours = $this->DomModel->getInfoUserMservice($_SESSION['user']);

        $infoUserCours = $this->profilModel->getINfoAllUserCours($_SESSION['user']);
        $fichier = "../Hffintranet/Views/assets/AccessUserProfil_Param.txt";
        $text = file_get_contents($fichier);
        $boolean = strpos($text, $_SESSION['user']);


        $this->twig->display(
            'badm/formBadm.html.twig',
            [
                'infoUserCours' => $infoUserCours,
                'boolean' => $boolean,
                'CodeServiceofCours' =>$CodeServiceofCours,

            ]
        );
        
    }

    public function envoiDonnerFiltrer()
    {
        
        $data1 = $this->badm->recuperationCaracterMateriel();

        header("Content-type:application/json");

        echo json_encode($data1);
    }

    public function showFormCompleBadm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            var_dump($_POST);
            $dateDemande = $this->getDatesystem();

            $this->SessionStart();
            $infoUserCours = $this->profilModel->getINfoAllUserCours($_SESSION['user']);
            $fichier = "../Hffintranet/Views/assets/AccessUserProfil_Param.txt";
            $text = file_get_contents($fichier);
            $boolean = strpos($text, $_SESSION['user']);


            $this->twig->display(
                'badm/formCompleBadm.html.twig', 
                [
                    'codeMouvement' => $_POST['typeMission'],
                    'infoUserCours' => $infoUserCours,
                    'boolean' => $boolean,
                    'dateDemande' => $dateDemande
            ]
        );
        }

    }

    public function formCompleBadm()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $jsonsata = file_get_contents("php://input");
            $data = json_decode($jsonsata, true);
            $NumBDM = $this->autoINcriment('BDM');
            $heureDemande = $this->getTime();
            $dateDemande = $this->getDatesystem();
            $MailUser = $this->DomModel->getmailUserConnect($_SESSION['user']);

            $insertDbBadm = [
                'Numero_Demande_BADM' => $NumBDM,
                'Code_Mouvement' => $_POST['codeMouvment'] ,
                'ID_Materiel' => $data['idMateriel'],
                'Nom_Session_Utilisateur' =>$_SESSION['user'] ,
                'Date_Demande' => $dateDemande,
                'Heure_Demande' => $heureDemande,
            
                'Agence_Service_Emetteur' => $data['agenceServiceEmetteur'],
                'Casier_Emetteur' => $data['casierEmetteur'],
                'Agence_Service_Destinataire' => $data['agenceServiceDestinataire'],
                'Casier_Destinataire' => $data['casierDestinataire'],
                'Motif_Arret_Materiel' => $data['motifArretMateriel'],
                'Etat_Achat' => $data['etatAchat'],
                'Date_Mise_Location' => $data['dateMiseLocation'],
                'Cout_Acquisition' => $data['coutAcquisition'],
                'Amortissement' => $data['amortissement'],
                'Valeur_Net_Comptable' => $data['valeurNetComptable'],
                'Nom_Client'  => $data['nomClient'],
                'Modalite_Paiement'  => $data['modalitePaiement'],
                'Prix_Vente_HT'  => $data['prixHt'],
                'Motif_Mise_Rebut'  => $data['motifMiseRebut'],
                'Heure_machine'  => $data['heuresMachine'],
                'KM_machine'  => $data['kilometrage']
            ]

            $this->odbcCrud->create('Demande_Mouvement_Materiel', $insertDbBadm);

            // $generPdfBadm = [
            //     'NUM_BDM' => $NumBDM,
            //     'Date_Demande' => $dateDemande,
            //     'Designation' => ,
            //     'Num_ID' => $data['idMateriel'],
            //     'Num_Serie' => ,
            //     'Groupe' => ,
            //     'Num_Parc' => ,
            //     'Constructeur' => ,
            //     'Date_Achat' => ,
            //     'Annee_Model' => ,
            //     'Modele' => ,
            //     'Agence_Service_Emetteur' => $data['agenceServiceEmetteur'] ,
            //     'Casier_Emetteur' => $data['casierEmetteur'],
            //     'Agence_Service_Destinataire' => $data['agenceServiceDestinataire'] ,
            //     'Casier_Destinataire' => $data['casierDestinataire'],
            //     'Motif_Arret_Materiel' => $data['motifArretMateriel'],
            //     'Etat_Achat' => $data['etatAchat'],
            //     'Date_Mise_Location' => $data['dateMiseLocation'],
            //     'Cout_Acquisition' => $data['coutAcquisition'],
            //     'Amort' => $data['amortissement'],
            //     'VNC' => $data['valeurNetComptable'],
            //     'Nom_Client' => $data['nomClient'] ,
            //     'Modalite_Paiement' => $data['modalitePaiement'] ,
            //     'Prix_HT' => $data['prixHt'],
            //     'Motif_Mise_Rebut' => $data['motifMiseRebut'],
            //     'Heures_Machine' => $data['heuresMachine'],
            //     'Kilometrage' => $data['kilometrage'],
            //     'Email_Emetteur' => $MailUser,
            //     'Agence_Service_Emetteur_Non_separer' => implode('',explode('-', $data['agenceServiceEmetteur']))
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
