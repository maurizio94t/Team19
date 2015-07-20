<?php
include_once ('tema.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ApuliaGo</title>

        <link rel="stylesheet" href="styleAccedi.css">
    </head>
    <body>

        <div id="container">

            <?php navH(3); ?>
            <?php logoH(); ?>

            <section id="access-form">
                <h2><center>Accedi</center></h2>
                <form method="POST" action="php_login/autenticazione.php" id="form_autenticazione" name="autenticazione" accept-charset="utf-8">
                    <label><span>Username/email</span>
                        <input type="text" name="email_o_nome_utente" placeholder="email o nome utente"/>
                    </label>
                    <label><span>Password</span>
                        <input type="password" name="password" id="password" placeholder="password"/>
                    </label>
                    <input type="submit" name="invio_dati" value="Invia"/>
                </form>
            </section>

            <?php footerH(); ?>
        </div>

    </body>
</html>
