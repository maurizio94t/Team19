<?php
require ('fpdf17/fpdf.php');

class PDF extends FPDF {
    // Page header
    function Header() {
        // Logo
        $this -> Image('img/ApuliaLogo.png', 10, 6, 30);
        // Arial bold 30
        $this -> SetFont('Arial', 'IB', 30);
        // Move to the right
        $this -> Cell(80);
        // Title
        $this -> Cell(60, 15, 'ApuliaGo', 1, 1, 'C');
        // Line break
        $this -> Ln(40);
    }

    // Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this -> SetY(-30);
        $this -> SetFont('Arial', '', 8);
        $this -> Cell(100, 10, convertStr('Questo è  un report di fine prenotazione, quindi si consiglia di stamparlo, per poi presentarlo in fase di utilizzo.'), 0, 1);
        // Courier italic 8
        $this -> SetFont('Arial', 'I', 8);
        // Page number
        $this -> Cell(0, 10, 'Page ' . $this -> PageNo() . '/{nb}', 0, 0, 'C');
    }

    function LoadData($file) {
        // Read file lines
        /*
         $lines = file($file);
         $data = array();
         foreach ($lines as $line)
         $data[] = explode(';', trim($line));
         return $data;
         */
        $fp = fopen("data.txt", "w");
        fwrite($fp, $file);

        $lines = file("data.txt");
        $data = array();
        foreach ($lines as $line)
            $data[] = explode(';', trim($line));
        return $data;
    }

    // Better table
    function ImprovedTable($header, $data) {
        // Column widths
        $w = array(15, 135, 20, 20);
        // Header
        $this -> SetFont('Arial', 'B', 10);
        for ($i = 0; $i < count($header); $i++)
            $this -> Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $this -> Ln();
        $this -> SetFont('Arial', '', 10);
        //PrezzoTotale
        $PrzTot = 0;
        // Data
        foreach ($data as $row) {
            $this -> Cell($w[0], 6, $row[0], 'LR');
            $this -> Cell($w[1], 6, convertStr($row[1]), 'LR');
            $this -> Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R');
            $this -> Cell($w[3], 6, number_format($row[3]) . convertStr(' €'), 'LR', 0, 'R');
            $this -> Ln();
            $PrzTot += $row[3] * $row[2];
        }
        $this -> Cell($w[0], 6, "", 'TL');
        $this -> Cell($w[1], 6, "", 'T');
        $this -> Cell($w[2], 6, "Totale ", 'TL', 0, 'R');
        $this -> Cell($w[3], 6, $PrzTot . convertStr(' €'), 'TR', 0, 'R');
        $this -> Ln();
        // Closing line
        $this -> Cell(array_sum($w), 0, '', 'T');
    }

}

//recupero i parametri passati nella pagina (sul form dell'HTML action="generateReport.php")

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$nome = "Maurizio";
    $nome = $_POST['nome'];
    //$cognome = "Troiani";
    $cognome = $_POST['cognome'];
    
    //$GG = "13";
    $GG = $_POST['GG'];
    //$MM = "06";
    $MM = $_POST['MM'];
    //$AAAA = "1994";
    $AAAA = $_POST['AAAA'];
    
    //$cf = "CBNASD95D21A662R";
    $cf = $_POST['cf'];
    
    //$paese = "Italia";
    $paese = $_POST['paese'];
    //$citta = "Bari";
    $citta = $_POST['citta'];
    //$provincia = "BA";
    $provincia = $_POST['provincia'];
    //$cap = "70129";
    $cap = $_POST['cap'];
    
    //$indirizzo = "via Nicola Manzari";
    $indirizzo = $_POST['indirizzo'];
    //$numCiv = "20";
    $numCiv = $_POST['civico'];
    
    //$tel = "3405818726";
    $tel = $_POST['tel'];
    
    
} else {
    echo "Errore inaspettato..";
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> SetMargins(10, 10);

//foglio A4 larghezza va da 0 a 210 (x)
//foglio A4 altezza va da 0 a 297 (y)
$pdf -> Line(5, 50, 205, 50);

$pdf -> SetFont('Arial', '', 12);
$pdf -> Cell(0, 5, $nome . " " . $cognome . " - " . $tel, 0, 1);
$pdf -> Cell(0, 5, $GG . "-" . $MM . "-" . $AAAA, 0, 1);
$pdf -> Cell(0, 5, $cf, 0, 1);
$pdf -> Ln(3);
$pdf -> Cell(0, 5, $indirizzo . "," . $numCiv, 0, 1);
$pdf -> Cell(0, 5, $paese, 0, 1);
$pdf -> Cell(0, 5, $citta . " (" . $provincia . "), " . $cap, 0, 1);

$pdf -> Cell(0, 5, "Ciccionn!", 0, 1, 'R');
// Column headings
$header = array(convertStr('Codice'), convertStr('Descrizione'), convertStr('Quantità'), convertStr('Prezzo'));
// Data loading
$data = $pdf -> LoadData("003;Corso di sub base con 5 immersioni;1;39\n024;Pranzo sul mare con specialità tipiche;2;23\n003;Corso di sub base con 5 immersioni;1;39");
$pdf -> SetFont('Arial', '', 14);
$pdf -> ImprovedTable($header, $data);
$pdf -> Output();

function convertStr($str) {
    return iconv('UTF-8', 'windows-1252', $str);
}
?>