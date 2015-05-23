<?php
# inizializzazione della sessione
@session_start();
# inclusione del file di funzione
@include_once 'functions.php';
# istanza della classe
$obj = new Iscrizioni();
# chiamata al metodo per la verifica della sessione
if ($obj->verifica_sessione())
{
  # redirect in caso di esito positivo
  @header("location:area_riservata.php");
}
# chiamata al metodo per l'autenticazione
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  $login = $obj->verifica_login(htmlentities($_POST['email_o_nome_utente'], ENT_QUOTES), htmlentities($_POST['password'], ENT_QUOTES));
  # controllo sull'esito del metodo
  if ($login) {
    # redirect in caso di esito positivo
    @header("location:area_riservata.php");
  }else{
    # notifica in caso di esito negativo
    echo 'I dati indicati non sono corretti.';
  }
}
# form per l'autenticazione
?>