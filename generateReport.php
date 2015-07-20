<?php
require ('fpdf17/fpdf.php');
include_once ('configDB.php');

class PDF extends FPDF {
    function Header() {
        $this -> Image('img/ApuliaLogo.png', 10, 6, 30);
        $this -> SetFont('Arial', 'IB', 30);
        $this -> Cell(80);
        $this -> Cell(60, 15, 'ApuliaGo', 1, 1, 'C');
        $this -> Ln(40);
    }

    function Footer() {
        $this -> SetY(-30);
        $this -> SetFont('Arial', '', 8);
        $this -> Cell(100, 10, convertStr('Questo è  un report di fine prenotazione, quindi si consiglia di stamparlo, per poi presentarlo in fase di utilizzo.'), 0, 1);
        $this -> SetFont('Arial', 'I', 8);
        $this -> Cell(0, 10, 'Page ' . $this -> PageNo() . '/{nb}', 0, 0, 'C');
    }

    function LoadData($file) {
        $fp = fopen("data.txt", "w");
        fwrite($fp, $file);

        $lines = file("data.txt");
        $data = array();
        foreach ($lines as $line)
            $data[] = explode(';', trim($line));
        return $data;
    }

    function ImprovedTable($header, $data) {
        $w = array(15, 135, 20, 20);
        
        $this -> SetFont('Arial', 'B', 10);
        for ($i = 0; $i < count($header); $i++)
            $this -> Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $this -> Ln();
        $this -> SetFont('Arial', '', 10);
        $PrzTot = 0;
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
        $this -> Cell(array_sum($w), 0, '', 'T');
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    
    $GG = $_POST['GG'];
    $MM = $_POST['MM'];
    $AAAA = $_POST['AAAA'];
    
    $cf = $_POST['cf'];
    $paese = $_POST['paese'];
    $citta = $_POST['citta'];
    $provincia = $_POST['provincia'];
    $cap = $_POST['cap'];
    
    $indirizzo = $_POST['indirizzo'];
    $numCiv = $_POST['civico'];
    
    $tel = $_POST['tel'];
    $Cod = $_POST['Cod'];
    $dataI = $_POST['dataI'];
    $dataF = $_POST['dataF'];
    $persone = $_POST['persone'];
    
    mysql_connect(DATA_HOST,DATA_UTENTE,DATA_PASS) or die(mysql_error());
    mysql_select_db(DATA_DB) or die(mysql_error());
        
    $query="SELECT NomeP,Prezzo FROM PuntiDiInteresse WHERE Cod='$Cod'";
    $res=mysql_query($query);
    if($res&&mysql_num_rows($res)>0) {
        while($row=mysql_fetch_assoc($res)) {
            $nomeP = $row['NomeP'];
            $prezzo = $row['Prezzo'];
        }
    }
    
    $dataP = $data = date('Y-m-d');
    $dataN = $AAAA."-".$MM."-".$GG;
    $query = "INSERT INTO Prenotazioni (DataP, Nome, Cognome, CF, DataN, Tel, DataI, DataF, CodPt) VALUES ('$dataP', '$nome', '$cognome', '$cf', '$dataN', '$tel', '$dataI', '$dataF', '$Cod')";
    $result = mysql_query($query);
} else {
    echo "Errore inaspettato..";
}

$pdf = new PDF();
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> SetMargins(10, 10);

//foglio A4 larghezza va da 0 a 210 (x)
//foglio A4 altezza va da 0 a 297 (y)
$pdf -> Line(5, 50, 205, 50);

$pdf -> SetFont('Arial', '', 12);
$pdf -> Cell(0, 5, $nome . " " . $cognome ." - " . $tel, 0, 1);
$pdf -> Cell(0, 5, $GG . "-" . $MM . "-" . $AAAA, 0, 1);
$pdf -> Cell(0, 5, $cf, 0, 1);
$pdf -> Ln(3);
$pdf -> Cell(0, 5, $indirizzo . "," . $numCiv, 0, 1);
$pdf -> Cell(0, 5, $paese, 0, 1);
$pdf -> Cell(0, 5, $citta . " (" . $provincia . "), " . $cap, 0, 1);

$ITdataI = new DateTime($dataI);
$ITdataF = new DateTime($dataF);
$pdf -> Cell(0, 5, "Dal ". $ITdataI->format('d-m-Y') . " al ". $ITdataF->format('d-m-Y'), 0, 1, 'R');

$header = array(convertStr('Codice'), convertStr('Descrizione'), convertStr('Persone'), convertStr('Prezzo'));
$data = $pdf -> LoadData($Cod.";".$nomeP.";".$persone.";". $prezzo);
$pdf -> SetFont('Arial', '', 14);
$pdf -> ImprovedTable($header, $data);
$pdf -> Output();



function convertStr($str) {
    return iconv('UTF-8', 'windows-1252', $str);
}
?>