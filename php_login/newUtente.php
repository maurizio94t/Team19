<?php
# inclusione del file di funzione
@include_once 'functions.php';
include_once ('../tema_inf.php');
# istanza della classe
$obj = new Iscrizioni();

# form per l'iscrizione
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
            <div id="mes-full">
                <!--Punti di interesse-->
            </div>
            
            <div id="navigation">
                <p align="right"/>
                    <a href="<?php echo "area_riservata.php"; ?>?val=fine_sessione" title="Logout">Esci</a>
                </p>
            </div>
            <div id="main-body">
                <h1>Aggiungi nuovo Utente </h1>
            </div>
            <div id="middle">
                <div class="newPt">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form_registrazione" name="registrazione">
                    <div class="head"><h1>Registrazione utente..</h1></div>
                    <label>Nome</label><br/>
                    <input type="text" name="nome_reale" /><br/>
                    <label>Nome utente</label><br/>
                    <input type="text" name="nome_utente" /><br/>
                    <label>Password</label><br/>
                    <input type="password" name="password" /><br/>
                    <label>Il tuo indirizzo di posta elettronica</label><br/>
                    <input type="text" name="email" id="email" /><br/><br/>
                    <input type="submit" name="registra" value="Aggiungi"/><br/><br/>
                </form>
                <p id="finalMsg">Ehhh</p>
                <?php
                # chiamata al metodo per la registrazione
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $registrato = $obj->registra(htmlentities($_POST['nome_reale'], ENT_QUOTES), htmlentities($_POST['nome_utente'], ENT_QUOTES), htmlentities($_POST['password'], ENT_QUOTES), htmlentities($_POST['email'], ENT_QUOTES));
                    # controllo sull'esito del metodo
                    if ($registrato) {
                        # notifica in caso di esito positivo
                        echo '<div id="finalMsg">Registrazione conclusa <a href="../home.php">ora il nuovo utente potrà loggarsi</a>.</div>';
                    }else{
                        # notifica in caso di esito negativo
                        echo '<div id="finalMsg"><font color="red">Il form non &egrave; stato compilato correttamente oppure stai cercando di registrarti con dei dati gi&agrave; presenti nel database.</font></div>';
                    }
                }
                ?>
                </div>
                
</div>
<?php footerH(); ?>
</div>
</body>
</html>