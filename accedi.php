<?php
include_once ('tema.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ApuliaGo</title>

		<link rel="stylesheet" href="styleAttrazioni.css">
	</head>
	<body>

		<div id="container">

			<?php navH(3); ?>
			<?php logoH(); ?>
			
			<div id="autenticazione" align="right">
			<form method="POST" action="php_login/autenticazione.php" id="form_autenticazione" name="autenticazione">
			<label>Username/email</label>
			<input type="text" name="email_o_nome_utente" />
			<label>Password</label>
			<input type="password" name="password" id="password" />
			<input type="submit" name="invio_dati" value="Invia"/>
			<br/>
			</form>
			</div>
			
			<?php footerH(); ?>
		</div>

	</body>
</html>
