<?php
@include_once 'functions.php';

$obj = new Iscrizioni();

if ($obj->verifica_sessione()) {
  @header("location:area_riservata.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $registrato = $obj->registra(htmlentities($_POST['nome_reale'], ENT_QUOTES), htmlentities($_POST['nome_utente'], ENT_QUOTES), htmlentities($_POST['password'], ENT_QUOTES), htmlentities($_POST['email'], ENT_QUOTES));
  
  if ($registrato) {
    echo 'Registrazione conclusa <a href="../home.php">ora puoi loggarti</a>.';
  }else{
    echo '<font color="red">Il form non &egrave; stato compilato correttamente oppure stai cercando di registrarti con dei dati gi&agrave; presenti nel database.</font>';
  }
}
?>
<!DOCTYPE HTML">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Pagina per la registrazione</title>
</head>
<body>
<div id="container">
  <div id="main-body">
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
    <input type="submit" name="registra" value="Registrami"/><br/><br/>
    <label><a href="autenticazione.php" title="Login">Se sei gi&agrave; registrato puoi loggarti da qui</a></label> 
  </form>
  </div>
</div>
</body>
</html>