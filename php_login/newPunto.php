<?php
include_once ('../tema_inf.php');
include_once ('config.php');
# inizializzazione della sessione
@session_start();

# inclusione del file di funzione
@include_once 'functions.php';

# istanza della classe
$obj = new Iscrizioni();

# identificativo univoco dell'utente
$id_utente = $_SESSION['id_utente'];

# chiamata al metodo per la verifica della sessione
if (!$obj -> verifica_sessione()) {
    #redirect in caso di sessione non verificata
    @header("location:autenticazione.php");
}

# controllo sul valore di input per il logout
if (isset($_GET['val']) && ($_GET['val'] == 'fine_sessione')) {
    # chiamata al metodo per il logout
    $obj -> esci();
    # redirezione alla pagina di login
    @header("location:autenticazione.php");
}

# Area riservata
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ApuliaGo</title>

        <link rel="stylesheet" href="styleAreaRiservata.css">
        
        <title>Area riservata</title>
        <?php navH(3); ?>
        <?php logoH(); ?>
    </head>
    <body>
        <div id="container">
            <div id="mes-full">
                <!--Punti di interesse-->
            </div>
            
            <div id="navigation">
                <p align="right"/>
                    <a href="<?php echo "area_riservata.php"; ?>?val=fine_sessione" title="Logout">Esci</a>
                </p>
            </div>
            <div id="main-body">
                <h1>Benvenuto nell'area riservata <?php $obj -> mostra_utente($id_utente); ?>
</h1>
            </div>
            <div id="middle">
                <div class="newPt">
                <form action="" method="post" enctype="multipart/form-data" name="form1">
                    <!-- CASELLE DI TESTO -->
                    Codice<br>
                    <input type="text" name="codice"><br>
                    Nome<br>
                    <input type="text" name="nome"><br>
                    Descrizione punto di interesse<br>
                    <input type="text" name="descrizione"><br><br>
                    Foto <input name="userimage" type="file">
                    <input type="submit" name="send" value="Inserisci Foto"></td>
                    <br>
                    Tipologia<br>
                    <select name="tipologia">
                        <option value="CB">Cibi</option>
                        <option value="ESP">Esplorazione</option>
                        <option value="SV">Svago</option>
                    </select><br><br><br>
                    <!-- SUBMIT -->
                    <input type="submit" name="invia" value="Invia i dati"">
                       
                </form>
                </div>
                
                <?php

                //Impostazioni varie da modificare a piacimento
                $dimensione_max = '12600000';
                // Dimensione massima delle foto
                $upload_dir = '../img/imgAttrazioni';
                // Cartella dove posizione le foto
                $estensioni = array("png", "jpg", "gif");
                // Tipi di File consentiti
                $noSubmitSend = 'Nessun upload eseguito!';
                // Messaggio di errore quando viene richiamato direttamente lo script PHP
                $wrongExt = 'Estensione file non valida!';
                // Messaggio di errore per tipo di file non consentito
                $tooBig = 'Il file eccede la dimensione max!';
                // Messaggio di errore per file troppo grande
                $thatsAll = 'Foto caricata con successo!';
                // Messaggio di OK per upload corretto
                $wrongUp = 'Something wrong here!';
                // Messaggio di errore quando lo script non riesce ad eseguire l'upload
                //***************************************

                // Controllo il submit del form HTML...
                if (isset($_POST['send'])) {
                    $file = $_FILES['userimage']['name'];

                    // Controllo il tipo di file...
                    if (in_array(array_pop(explode('.', $file)), $estensioni)) {

                        // Controllo la dimensione del file...
                        $dimensione_file = $_FILES['userimage']['size'];
                        if ($dimensione_file > $dimensione_max) {
                            print $tooBig;
                        } else {
                            doUpload($file, $upload_dir);
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
                    } else
                        print $wrongUp;

                }

                mysql_connect(DATA_HOST, DATA_UTENTE, DATA_PASS) or die(mysql_error());
                mysql_select_db(DATA_DB) or die(mysql_error());

                $query = "SELECT * FROM PuntiDiInteresse";
                $result = mysql_query($query);
            ?>
</div>
<?php footerH(); ?>
</div>
</body>
</html>