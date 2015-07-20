<?php
include_once ('../tema_inf.php');
include_once ('config.php');

@session_start();
@include_once 'functions.php';

$obj = new Iscrizioni();

$id_utente = $_SESSION['id_utente'];

if (!$obj -> verifica_sessione()) {
    @header("location:autenticazione.php");
}

if (isset($_GET['val']) && ($_GET['val'] == 'fine_sessione')) {
    $obj -> esci();
    @header("location:autenticazione.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ApuliaGo</title>

        <link rel="stylesheet" href="styleNewPunto.css">
        <title>Area riservata</title>
        <?php navH(3); ?>
        <?php logoH(); ?>
    </head>
    <body>
        <div id="container">
            <p align="right"/>
                <a href="<?php echo "area_riservata.php"; ?>?val=fine_sessione" title="Logout">Esci</a>
            </p>
            <div id="main-body">
                <h1><center>Aggiungi nuovo Punto di Interesse</center></h1>
            </div>
            <div id="middle">
                <section id="newuser-form">
                <form action="" method="post" enctype="multipart/form-data" name="form1">
                    Nome Punto di Interesse
                    <input type="text" name="nome"><br>
                    Descrizione Punto di Interesse
                    <input type="text" name="descrizione"><br>
                    Foto <input name="userimage" type="file">
                    Tipologia
                    <select name="categoria">
                        <option value="CB">Cibi</option>
                        <option value="ESP">Esplorazione</option>
                        <option value="SV">Svago</option>
                    </select><br><br>
                    Latitudine (es: 40.857374)
                    <input type="text" name="latitudine"><br>
                    Longitudine (es: 40.857374)
                    <input type="text" name="longitudine"><br>
                    Prezzo (es: 49.90)
                    <input type="text" name="prezzo">
                    <br><br>
                    <input type="submit" name="send" value="Invia Dati"></td>
                       
                </form>
                </section>
                
                <?php
                $dimensione_max = '12600000';
                $upload_dir = '../img/imgAttrazioni';
                $estensioni = array("png", "jpg", "gif");
                $noSubmitSend = '<center>Nessun upload eseguito!</center>';
                $wrongExt = '<center>Estensione file non valida!</center>';
                $tooBig = '<center>Il file eccede la dimensione max!</center>';
                $thatsAll = '<font color="#9BA500"><center>Foto caricata con successo!</center></font>';
                $wrongUp = '<center>Something wrong here!</center>';

                if (isset($_POST['send'])) {
                    $file = $_FILES['userimage']['name'];
                    
                    if (in_array(array_pop(explode('.', $file)), $estensioni)) {

                        $dimensione_file = $_FILES['userimage']['size'];
                        if ($dimensione_file > $dimensione_max) {
                            print $tooBig;
                        } else {
                            $newname = doUpload($file, $upload_dir);
                        }

                    } else {
                        print $wrongExt;
                    }
                } else {
                    print $noSubmitSend;
                }

                function doUpload($file, $upload_dir) {
                    global $thatsAll;

                    $nomefile = $_FILES['userimage']['tmp_name'];
                    $nomereale = $_FILES['userimage']['name'];
                    $nomereale = htmlentities(strtolower($nomereale));

                    if (is_uploaded_file($nomefile)) {
                        $newname = ($nomereale);
                        $ext = end(explode('.', $nomereale));
                        $filename = explode('.', $nomereale);
                        if (file_exists($upload_dir . '/' . $nomereale)) {
                            $filename[0] .= '.';
                            for ($a = 0; $a <= 9; $a++)
                                $filename[0] .= chr(rand(97, 122));
                            $newname = $filename[0] . '.' . $ext;
                        }

                        $newname = str_replace(' ', '_', $newname);
                        
                        @move_uploaded_file($nomefile, ($upload_dir . '/' . $newname));
                        print $thatsAll;
                        return $newname;
                    } else
                        print $wrongUp;

                }

                mysql_connect(DATA_HOST, DATA_UTENTE, DATA_PASS) or die(mysql_error());
                mysql_select_db(DATA_DB) or die(mysql_error());
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nome = $_POST['nome'];
                    $descr = $_POST['descrizione'];
                    $img = "imgAttrazioni/" . $newname;
                    $cat = $_POST['categoria'];
                    $lat = $_POST['latitudine'];
                    $long = $_POST['longitudine'];
                    $prz = $_POST['prezzo'];
                    
                    $query = "INSERT INTO PuntiDiInteresse (Nome, Descrizione, Img, Categoria, Latitudine, Longitudine, Prezzo) VALUES ('$nome', '$descr', '$img', '$cat', '$lat', '$long', '$prz')";
                    $result = mysql_query($query);
                    echo "<center>Punto di interesse inserito!</center>";
                }
                
            ?>
</div>
<?php footerH(); ?>
</div>
</body>
</html>