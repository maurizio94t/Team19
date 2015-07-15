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
    //@header("location:autenticazione.php");
    @header("location:../accedi.php");
}

# controllo sul valore di input per il logout
if (isset($_GET['val']) && ($_GET['val'] == 'fine_sessione')) {
    # chiamata al metodo per il logout
    $obj -> esci();
    # redirezione alla pagina di login
    @header("location:../accedi.php");
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
                <h1>Benvenuto nell'area riservata <?php $obj -> mostra_utente($id_utente); ?></h1>
            </div>
            <div id="middle">
                <span><a href="prenotazioni.php">Visualizza e Cancella Prenotazioni</a></span> <br/>
                <span><a href="punti.php">Visualizza e Cancella Punti di Interesse</a></span> <br/>
                <span><a href="newPunto.php">Aggiugni Nuovo Punto di Interesse</a></span> <br/>
                <span><a href="utenti.php">Visualizza e Cancella Personale</a></span> <br/>
                <span><a href="">Aggiugni Personale</a></span> <br/>
            </div>
            <?php footerH(); ?>
        </div>
    </body>
</html>