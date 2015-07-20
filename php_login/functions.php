<?php
@include_once 'config.php';

class Iscrizioni {
  public function __construct() {
    $data = new DATA_Class();
  }

  public function registra($nome_reale, $nome_utente, $password, $email) {
    $nome_reale = trim($nome_reale);
    $nome_utente = trim($nome_utente);
    $password = trim($password);

    if (strlen($nome_reale) == 0 || strlen($nome_utente) == 0 || strlen($password) == 0) {
    	return false;
	}else{
      $password = @sha1($password);
      $query = @mysql_query("SELECT id_utente FROM Utenti WHERE nome_utente = '$nome_utente' OR email = '$email'") or die('Errore: ' . mysql_error());
      $conta = @mysql_num_rows($query);
      if ($conta == 0) {
        $risultato = @mysql_query("INSERT INTO Utenti(nome_utente, password, nome_reale, email) VALUES ('$nome_utente', '$password','$nome_reale','$email')") or die('Errore: ' .mysql_error());
        return $risultato;
      }else{
        return false;
      }
    }
  }

  public function verifica_login($email_o_nome_utente, $password) {
    $password = @sha1($password);
    $query = @mysql_query("SELECT id_utente FROM Utenti WHERE (email = '$email_o_nome_utente' OR nome_utente='$email_o_nome_utente') AND password = '$password'") or die('Errore: ' . mysql_error());
    $conta = @mysql_num_rows($query);
    if ($conta == 1) {
      $risultato = @mysql_fetch_object($query);
      $_SESSION['login'] = true;
      $_SESSION['id_utente'] = $risultato->id_utente;
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function mostra_utente($id_utente) {
    $query = @mysql_query("SELECT nome_reale FROM Utenti WHERE id_utente = $id_utente") or die('Errore: ' . mysql_error());
    $risultato = @mysql_fetch_object($query);
    echo $risultato->nome_reale;
  }

  public function verifica_sessione() {
    if(isset($_SESSION['login'])) {
      return $_SESSION['login'];
    }else{
      return FALSE;
    }
  }
  
  public function esci() {
    $_SESSION['login'] = FALSE;
    @session_destroy();
    }
  }
?>