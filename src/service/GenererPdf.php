<?php



include dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'TCPDF-main/tcpdf.php';
class genererPdfBadm
{
    function genererPdfBadm(array $tab)
    {

        $pdf = new TCPDF();


        $pdf->AddPage();


        $pdf->setFont('helvetica', 'B', 14);
        $pdf->setAbsY(11);
        $logoPath = $_SERVER['DOCUMENT_ROOT'] . '/Hffintranet/Views/assets/henrifraise.jpg';
        $pdf->Image($logoPath, '', '', 45, 12);
        $pdf->setAbsX(55);
        //$pdf->Cell(45, 12, 'LOGO', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->Cell(110, 6, 'BORDEREAU DE MOUVEMENT DE MATERIEL', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->setAbsX(170);
        $pdf->setFont('helvetica', 'B', 10);
        $pdf->Cell(35, 6, $tab['NUM_BDM'], 0, 0, 'L', false, '', 0, false, 'T', 'M');
        $pdf->Ln(6, true);

        $pdf->setFont('helvetica', 'B', 12);
        $pdf->setAbsX(55);
        $pdf->cell(110, 6, 'TYPE DE DEMANDE', 1, 0, 'C', false, '', 0, false, 'T', 'M');

        $pdf->setFont('helvetica', 'B', 10);
        $pdf->setAbsX(170);
        $pdf->cell(35, 6, 'Le : ' . $tab['Date_Demande'], 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->Ln(10, true);

        $pdf->setFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 255);
        $pdf->Cell(50, 6, 'Caractéristiques du matériel', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->SetFillColor(0, 0, 255);
        $pdf->setAbsXY(70, 28);
        $pdf->Rect($pdf->GetX(), $pdf->GetY(), 130, 3, 'F');
        $pdf->Ln(10, true);

        $pdf->SetTextColor(0, 0, 0);
        $pdf->setFont('helvetica', 'B', 10);

        $pdf->cell(25, 6, 'Désignation :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(70, 6, $tab['Designation'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->setAbsX(150);
        $pdf->cell(12, 6, 'N° ID :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(0, 6, $tab['Num_ID'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->Ln(10, true);

        $pdf->cell(25, 6, 'N° Série :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(70, 6, $tab['Num_Serie'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->setAbsX(130);
        $pdf->cell(30, 6, 'Groupe :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(0, 6, $tab['Groupe'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->Ln(10, true);


        $pdf->cell(25, 6, 'N° Parc :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(70, 6, $tab['Num_Parc'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->setAbsX(130);
        $pdf->cell(30, 6, 'Constructeur :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(0, 6, $tab['Constructeur'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->Ln(10, true);

        $pdf->cell(25, 6, 'Date d’achat :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(40, 6, $tab['Date_Achat'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->setAbsX(80);
        $pdf->MultiCell(20, 6, "Année du\nmodèle :", 0, 'L', false, 0);
        $pdf->cell(35, 6, $tab['Annee_Model'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->setAbsX(140);
        $pdf->cell(20, 6, 'Modèle :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(0, 6, $tab['Modele'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->Ln(10, true);

        $pdf->setFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 255);
        $pdf->Cell(40, 6, 'Service émetteur', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->SetFillColor(0, 0, 255);
        $pdf->setAbsXY(50, 80);
        $pdf->Rect($pdf->GetX(), $pdf->GetY(), 150, 3, 'F');
        $pdf->Ln(10, true);

        $pdf->SetTextColor(0, 0, 0);
        $pdf->setFont('helvetica', 'B', 10);

        $pdf->cell(32, 6, 'Agence - Service :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(70, 6, $tab['Agence_Service_Emetteur'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->setAbsX(130);
        $pdf->cell(30, 6, 'Casier :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(0, 6, $tab['Casier_Emetteur'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->Ln(10, true);



        $pdf->setFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 255);
        $pdf->Cell(40, 6, 'Service destinataire', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->SetFillColor(0, 0, 255);
        $pdf->setAbsXY(54, 102);
        $pdf->Rect($pdf->GetX(), $pdf->GetY(), 147, 3, 'F');
        $pdf->Ln(10, true);

        $pdf->SetTextColor(0, 0, 0);
        $pdf->setFont('helvetica', 'B', 10);

        $pdf->cell(32, 6, 'Agence - Service :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(70, 6, $tab['Agence_Service_Destinataire'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->setAbsX(130);
        $pdf->cell(30, 6, 'Casier :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(0, 6, $tab['Casier_Destinataire'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->Ln(10, true);


        $pdf->cell(32, 6, 'Motif :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(0, 6, $tab['Motif_Arret_Materiel'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->Ln(10, true);



        $pdf->setFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 255);
        $pdf->Cell(40, 6, 'Entrée en parc', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->SetFillColor(0, 0, 255);
        $pdf->setAbsXY(43, 134);
        $pdf->Rect($pdf->GetX(), $pdf->GetY(), 158, 3, 'F');
        $pdf->Ln(10, true);

        $pdf->SetTextColor(0, 0, 0);
        $pdf->setFont('helvetica', 'B', 10);

        $pdf->cell(25, 6, 'Etat à l’achat:', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(70, 6, $tab['Etat_Achat'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->setAbsX(110);
        $pdf->cell(50, 6, 'Date de mise en location :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(0, 6, $tab['Date_Mise_Location'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->Ln(10, true);



        $pdf->setFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 255);
        $pdf->Cell(40, 6, 'Valeur (MGA)', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->SetFillColor(0, 0, 255);
        $pdf->setAbsXY(41, 156);
        $pdf->Rect($pdf->GetX(), $pdf->GetY(), 160, 3, 'F');
        $pdf->Ln(10, true);

        $pdf->SetTextColor(0, 0, 0);
        $pdf->setFont('helvetica', 'B', 10);


        $pdf->MultiCell(25, 6, "Coût\nd’acquisition:", 0, 'L', false, 0);
        $pdf->cell(70, 6, $tab['Cout_Acquisition'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->setAbsX(110);
        $pdf->cell(20, 6, 'Amort :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(0, 6, $tab['Amort'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->SetFillColor(0, 0, 0);
        $pdf->setAbsXY(130, 174);
        $pdf->Rect($pdf->GetX(), $pdf->GetY(), 70, 1, 'F');
        $pdf->Ln(3, true);
        $pdf->setAbsX(110);
        $pdf->cell(20, 6, 'VNC :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(0, 6, $tab['VNC'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->Ln(10, true);




        $pdf->setFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 255);
        $pdf->Cell(40, 6, 'Cession d’actif', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->SetFillColor(0, 0, 255);
        $pdf->setAbsXY(44, 189);
        $pdf->Rect($pdf->GetX(), $pdf->GetY(), 158, 3, 'F');
        $pdf->Ln(10, true);

        $pdf->SetTextColor(0, 0, 0);
        $pdf->setFont('helvetica', 'B', 10);

        $pdf->MultiCell(25, 6, "Nom\nclient :", 0, 'L', false, 0);
        $pdf->cell(70, 6, $tab['Nom_Client'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->setAbsX(110);
        $pdf->MultiCell(25, 6, "Modalité de\npaiement :", 0, 'L', false, 0);
        $pdf->cell(0, 6, $tab['Modalite_Paiement'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->Ln(10, true);
        $pdf->cell(25, 6, 'Prix HT :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(70, 6, $tab['Prix_HT'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->Ln(10, true);


        $pdf->setFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 255);
        $pdf->Cell(40, 6, 'Mise au rebut', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->SetFillColor(0, 0, 255);
        $pdf->setAbsXY(41, 221);
        $pdf->Rect($pdf->GetX(), $pdf->GetY(), 160, 3, 'F');
        $pdf->Ln(10, true);


        $pdf->SetTextColor(0, 0, 0);
        $pdf->setFont('helvetica', 'B', 10);

        $pdf->cell(25, 6, 'Motif :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(0, 6, $tab['Motif_Mise_Rebut'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->Ln(10, true);



        $pdf->setFont('helvetica', 'B', 12);
        $pdf->SetTextColor(0, 0, 255);
        $pdf->Cell(40, 6, 'Etat machine', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->SetFillColor(0, 0, 255);
        $pdf->setAbsXY(40, 243);
        $pdf->Rect($pdf->GetX(), $pdf->GetY(), 160, 3, 'F');
        $pdf->Ln(10, true);

        $pdf->SetTextColor(0, 0, 0);
        $pdf->setFont('helvetica', 'B', 10);

        $pdf->MultiCell(25, 6, "Heures\nmachine :", 0, 'L', false, 0);
        $pdf->cell(70, 6, $tab['Heures_Machine'], 1, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->setAbsX(110);
        $pdf->cell(24, 6, 'Kilométrage :', 0, 0, '', false, '', 0, false, 'T', 'M');
        $pdf->cell(0, 6, $tab['Kilometrage'], 1, 0, '', false, '', 0, false, 'T', 'M');


        // entête email
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('helvetica', 'BI', 10);
        $pdf->SetXY(120, 2); // Déplace le curseur à la position absolue X=170, Y=0
        $pdf->Cell(35, 6, 'Email émetteur : ' . $tab['Email_Emetteur'], 0, 0, 'L');



        $Dossier = $_SERVER['DOCUMENT_ROOT'] . '/Hffintranet/Upload/';
        $pdf->Output($Dossier . $tab['Num_BDM'] . '_' . $tab['Agence_Service_Emetteur_Non_separer'] . '.pdf', 'F');

        //$pdf->Output('exemple.pdf', 'I');
    }
}
