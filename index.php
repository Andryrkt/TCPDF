<?php

include __DIR__ . DIRECTORY_SEPARATOR . 'TCPDF-main/tcpdf.php';


$pdf = new TCPDF();

// $pdf->setPrintHeader(true);

// $pdf->setPrintFooter(false);

$pdf->AddPage();



$pdf->setFont('helvetica', 'B', 14);
$pdf->Cell(45, 12, 'LOGO', 0, 0, '', false, '', 0, false, 'T', 'M');
$pdf->Cell(110, 6, 'BORDEREAU DE MOUVEMENT DE MATERIEL', 0, 0, '', false, '', 0, false, 'T', 'M');
$pdf->setAbsX(170);
$pdf->setFont('helvetica', 'B', 10);
$pdf->Cell(35, 6, 'BDM XXXXXXXX', 0, 0, 'L', false, '', 0, false, 'T', 'M');
$pdf->Ln(6, true);

$pdf->setFont('helvetica', 'B', 12);
$pdf->setAbsX(55);
$pdf->cell(110, 6, 'TYPE DE DEMANDE', 1, 0, 'C', false, '', 0, false, 'T', 'M');

$pdf->setFont('helvetica', 'B', 10);
$pdf->setAbsX(170);
$pdf->cell(35, 6, 'Le : XX/XX/XXXX', 0, 0, '', false, '', 0, false, 'T', 'M');
$pdf->Ln(10, true);

$pdf->setFont('helvetica', 'B', 12);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(50, 6, 'Caractéristiques du matériel', 0, 0, '', false, '', 0, false, 'T', 'M');
$pdf->SetFillColor(0, 0, 255);
$pdf->setAbsXY(70, 28);
$pdf->Rect($pdf->GetX(), $pdf->GetY(), 130, 3, 'F');
$pdf->Ln(10, true);

$pdf->setFont('helvetica', 'B', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->cell(25, 6, 'Désignation :', 0, 0, '', false, '', 0, false, 'T', 'M');
$pdf->cell(70, 6, '', 1, 0, '', false, '', 0, false, 'T', 'M');
$pdf->setAbsX(150);
$pdf->cell(12, 6, 'N° ID :', 0, 0, '', false, '', 0, false, 'T', 'M');
$pdf->cell(35, 6, '', 1, 0, '', false, '', 0, false, 'T', 'M');
$pdf->Ln(10, true);

$pdf->cell(25, 6, 'N° Série :', 0, 0, '', false, '', 0, false, 'T', 'M');
$pdf->cell(70, 6, '', 1, 0, '', false, '', 0, false, 'T', 'M');
$pdf->setAbsX(130);
$pdf->cell(30, 6, 'Groupe :', 0, 0, '', false, '', 0, false, 'T', 'M');
$pdf->cell(35, 6, '', 1, 0, '', false, '', 0, false, 'T', 'M');
$pdf->Ln(10, true);


$pdf->cell(25, 6, 'N° Parc :', 0, 0, '', false, '', 0, false, 'T', 'M');
$pdf->cell(70, 6, '', 1, 0, '', false, '', 0, false, 'T', 'M');
$pdf->setAbsX(130);
$pdf->cell(30, 6, 'Constructeur :', 0, 0, '', false, '', 0, false, 'T', 'M');
$pdf->cell(35, 6, '', 1, 0, '', false, '', 0, false, 'T', 'M');
$pdf->Ln(10, true);

$pdf->cell(25, 6, 'Date d’achat :', 0, 0, '', false, '', 0, false, 'T', 'M');
$pdf->cell(40, 6, '', 1, 0, '', false, '', 0, false, 'T', 'M');
$pdf->setAbsX(80);
$texte = "Année du\nmodèle :";
$pdf->MultiCell(20, 6, $texte, 0, 'L', false, 0);
$pdf->cell(35, 6, '', 1, 0, '', false, '', 0, false, 'T', 'M');
$pdf->setAbsX(140);
$pdf->cell(20, 6, 'Modèle :', 0, 0, '', false, '', 0, false, 'T', 'M');
$pdf->cell(35, 6, '', 1, 0, '', false, '', 0, false, 'T', 'M');
$pdf->Ln(10, true);

$pdf->setFont('helvetica', 'B', 12);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(40, 6, 'Service émetteur', 0, 0, '', false, '', 0, false, 'T', 'M');
$pdf->SetFillColor(0, 0, 255);
$pdf->setAbsXY(50, 80);
$pdf->Rect($pdf->GetX(), $pdf->GetY(), 150, 3, 'F');
$pdf->Ln(10, true);











$pdf->SetFont('helvetica', 'BI', 10);
$pdf->SetXY(120, 0); // Déplace le curseur à la position absolue X=170, Y=0
$pdf->Cell(35, 6, 'Email émetteur :', 0, 0, 'L');

$pdf->Output('exemple.pdf', 'I');
