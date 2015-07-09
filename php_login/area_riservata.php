<?php
include_once ('../tema_inf.php');
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
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?val=fine_sessione" title="Logout">
                    <p align="right"/>Esci</p>
                </a>
            </div>
            <div id="main-body">
                <h1>Benvenuto nell'area riservata <?php $obj -> mostra_utente($id_utente); ?></h1>
            </div>
            <div id="middle">
                <span>Visualizza Prenotazioni</span> <br/>
                <span>Cancella Prenotazione</span> <br/>
                <span>Aggiugni Punto di Interesse</span> <br/>
                
                <?php
                    $str = "Gaaaaaayyy";
                    if ($id_utente == 1) {
                        echo $str;
                    }
                ?>
            </div>
            <?php footerH(); ?>
        </div>
    </body>
</html>