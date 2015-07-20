<?php

@include_once 'functions.php';
include_once ('../tema_inf.php');

$obj = new Iscrizioni();

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
                <h1><center>Aggiungi nuovo Utente</center></h1>
            </div>
            <div id="middle">
                <section id="newuser-form">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form_registrazione" name="registrazione">
                    <label>Nome reale</label>
                    <input type="text" name="nome_reale" placeholder="es. Mario"/><br/>
                    <label>Username</label>
                    <input type="text" name="nome_utente" placeholder="es. rossi94"/><br/>
                    <label>Password</label>
                    <input type="password" name="password"/><br/>
                    <label>Il tuo indirizzo di posta elettronica</label>
                    <input type="text" name="email" id="email" placeholder="es. mario.rossi@gmail.com"/><br/><br/>
                    <input type="submit" name="registra" value="Aggiungi"/><br/><br/>
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $registrato = $obj->registra(htmlentities($_POST['nome_reale'], ENT_QUOTES), htmlentities($_POST['nome_utente'], ENT_QUOTES), htmlentities($_POST['password'], ENT_QUOTES), htmlentities($_POST['email'], ENT_QUOTES));
                    if ($registrato) {
                        echo '<div id="finalMsg">Registrazione conclusa <a href="../home.php">ora il nuovo utente potrà loggarsi</a>.</div>';
                    } else {
                        echo '<div id="finalMsg"><font color="red">Il form non &egrave; stato compilato correttamente oppure stai cercando di registrarti con dei dati gi&agrave; presenti nel database.</font></div>';
                    }
                }
                ?>
                </section>
            </div>
            <?php footerH(); ?>
        </div>
    </body>
</html>