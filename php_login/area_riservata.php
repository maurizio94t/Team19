<?php
include_once ('../tema_inf.php');
@session_start();
@include_once 'functions.php';

$obj = new Iscrizioni();

$id_utente = $_SESSION['id_utente'];

if (!$obj -> verifica_sessione()) {
    @header("location:../accedi.php");
}

if (isset($_GET['val']) && ($_GET['val'] == 'fine_sessione')) {
    $obj -> esci();
    @header("location:../accedi.php");
}
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
            <p align="right"/>
                <a href="<?php echo "area_riservata.php"; ?>?val=fine_sessione" title="Logout">Esci</a>
            </p>
            <div id="mes-full">
            </div>
          
            <div id="main-body">
                <h1>Benvenuto nell'area riservata <?php $obj -> mostra_utente($id_utente); ?></h1>
            </div>
            <div id="middle">
                <span><a href="prenotazioni.php">Visualizza e Cancella Prenotazioni</a></span> <br/>
                <span><a href="punti.php">Visualizza e Cancella Punti di Interesse</a></span> <br/>
                <span><a href="newPunto.php">Aggiugni Nuovo Punto di Interesse</a></span> <br/>
                <span><a href="utenti.php">Visualizza e Cancella Personale</a></span> <br/>
                <span><a href="newUtente.php">Aggiugni Personale</a></span> <br/>
            </div>
            <?php footerH(); ?>
        </div>
    </body>
</html>