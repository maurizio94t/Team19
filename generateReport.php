<?php
require('fpdf17/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('img/ApuliaLogo.png',10,6,30);
    // Courier bold 15
    $this->SetFont('Courier','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'ApuliaGo',1,0,'C');
    // Line break
    $this->Ln(40);
    $this->Line(5,50,205,50);   //foglio A4 larghezza va da 0 a 210 (x)
                                //foglio A4 altezza va da 0 a 297 (y)
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Courier italic 8
    $this->SetFont('Courier','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Courier','',12);
$i = 10;
$pdf->Cell(0,10,'Printing line number 1',0,1);
$pdf->Cell(0,10,'Printing line number 2',0,1);

//$pdf->Cell(40,10,'Hello World',1,1);
//$pdf->Cell(40,10,'Powered by FPDF.',0,1);
//$pdf->Cell(50,100,'GiorgioTown',0);

$pdf->Output();


?>