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
                <h1>Benvenuto nell'area riservata <?php $obj -> mostra_utente($id_utente); ?></h1>
            </div>
            <div id="middle">
                <script language="javascript" type="text/javascript">
                function cancella(Cod) {
                    var sei_sicuro = confirm('Sei sicuro di voler cancellare l\'utente con id: ' + Cod + '?');
                    if (sei_sicuro) {
                        window.location.replace("punti.php?Cod="+Cod);
                    }else{
                        alert('Cancellazione NON eseguita..');
                    }
                }
				</script>
                <?php

                mysql_connect(DATA_HOST, DATA_UTENTE, DATA_PASS) or die(mysql_error());
                mysql_select_db(DATA_DB) or die(mysql_error());
                
                $Cod=$_GET['Cod'];
                if($Cod != null) {
                    $query="DELETE FROM Utenti WHERE id_utente='$Cod'";
                    $res=mysql_query($query);
                }
                
                $query = "SELECT * FROM Utenti";
                $result = mysql_query($query);

                if ($result && mysql_num_rows($result) > 0) {
                    echo "<div id='tabPrenotazioniPunti'><table border='1'>
                    <th>ID Utente</th>
                    <th>Nome Utente</th>
                    <th>Password</th>
                    <th>Nome Reale</th>
                    <th>Email</th>
                    <th>Elimina</th>";
                    while ($row = mysql_fetch_assoc($result)) {
                        $CodDelete = $row['id_utente'];
                        echo "<tr>
                            <td>" . $row['id_utente'] . "</td>
                            <td>" . $row['nome_utente'] . "</td>
                            <td>" . $row['password'] . "</td>
                            <td>" . $row['nome_reale'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td><center><a href='javascript:cancella($CodDelete)'>
                            <img src='../img/icon_cancella.png' align='center'>
                            </a></center></td>
                        </tr>";
                    }
                    echo "</table></div>";
                } else
                    echo "nessun risultato";
            ?>
</div>
<?php footerH(); ?>
</div>
</body>
</html>