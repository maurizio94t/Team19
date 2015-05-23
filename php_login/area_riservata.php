<?php

# inizializzazione della sessione
@session_start();

# inclusione del file di funzione
@include_once 'functions.php';

# istanza della classe
$obj = new Iscrizioni();

# identificativo univoco dell'utente
$id_utente = $_SESSION['id_utente'];

# chiamata al metodo per la verifica della sessione
if (!$obj->verifica_sessione()) {
  #redirect in caso di sessione non verificata
  @header("location:autenticazione.php");
}

# controllo sul valore di input per il logout
if (isset($_GET['val']) && ($_GET['val'] == 'fine_sessione')) {
  # chiamata al metodo per il logout
  $obj->esci();
  # redirezione alla pagina di login
  @header("location:autenticazione.php");
}

function aaa() {
	
}

$str = "Gaaaaaayyy";
if ($id_utente == 1) {
	$str = "SoLo MAURI";
}
echo $str;

aaa();

# Area riservata
?>
<!DOCTYPE HTML">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Area riservata</title>
</head>
<body>
<div id="container">
  <div id="navigation"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?val=fine_sessione" title="Logout"><p align="right"/>Esci</p></a></div>
  <div id="main-body">
  	<h1>Benvenuto nell'area riservata <?php $obj->mostra_utente($id_utente);# visualizzazione del nome reale dell'utente ?></h1>
  </div>
  <div id="middle">
  	<h3> Ciao </h3>
  </div>
  <div id="footer"> work in progress..</div>
</div>
</body>
</html>