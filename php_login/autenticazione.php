<?php
@session_start();
@include_once 'functions.php';

$obj = new Iscrizioni();

if ($obj->verifica_sessione()) {
  @header("location:area_riservata.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  $login = $obj->verifica_login(htmlentities($_POST['email_o_nome_utente'], ENT_QUOTES), htmlentities($_POST['password'], ENT_QUOTES));

  if ($login) {
    @header("location:area_riservata.php");
  }else{
    echo 'I dati indicati non sono corretti.';
  }
}
?>