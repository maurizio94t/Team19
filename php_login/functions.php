<?php
# inclusione del file di configurazione
@include_once 'config.php';
# definizione della classe che conterrà i metodi per la gestione degli Utenti
class Iscrizioni {
  
  # definizione del costruttore
  public function __construct() 
  {
    # istanza della classe per la connessione al database
    $data = new DATA_Class();
  }

  # metodo per la registrazione 
  public function registra($nome_reale, $nome_utente, $password, $email) 
  {
    # tolgo eventuali spazi vuoti
    $nome_reale = trim($nome_reale);
    $nome_utente = trim($nome_utente);
    $password = trim($password);
    # verifico che il modulo sia stato compilato
    if (strlen($nome_reale) == 0 || strlen($nome_utente) == 0 || strlen($password) == 0) {
    	return false;
	}else{
      # cifratura della password
      $password = @sha1($password);
      # confronto degli input con i dati contenuti in tabella
      $query = @mysql_query("SELECT id_utente FROM Utenti WHERE nome_utente = '$nome_utente' OR email = '$email'") or die('Errore: ' . mysql_error());
      # controllo sulla presenza di corrispondenze prodotte dal confronto
      $conta = @mysql_num_rows($query);
      # se il confronto non genera corrispondenze..
      if ($conta == 0) 
      {
        # ..si procede con la registrazione..
        $risultato = @mysql_query("INSERT INTO Utenti(nome_utente, password, nome_reale, email) VALUES ('$nome_utente', '$password','$nome_reale','$email')") or die('Errore: ' .mysql_error());
        return $risultato;
      }else{
        # ..altrimenti l'esito della registrazione sarà negativo
        return false;
      }
    }
  }

  # metodo per l'autenticazione
  public function verifica_login($email_o_nome_utente, $password) 
  {
    # cifratura della password
    $password = @sha1($password);
    # confronto degli input con i dati contenuti in tabella
    $query = @mysql_query("SELECT id_utente FROM Utenti WHERE (email = '$email_o_nome_utente' OR nome_utente='$email_o_nome_utente') AND password = '$password'") or die('Errore: ' . mysql_error());
    # controllo sulla presenza di una corrispondenza prodotta dal confronto
    $conta = @mysql_num_rows($query);
    # se il confronto genera una corrispondenza..
    if ($conta == 1) 
    {
      # ..viene generata la sessione di login..
      $risultato = @mysql_fetch_object($query);
      $_SESSION['login'] = true;
      $_SESSION['id_utente'] = $risultato->id_utente;
      return TRUE;
    }else{
      # ..altrimenti l'esito dell'autenticazione sarà negativo
      return FALSE;
    }
  }

  # metodo per la visualizzazione del nome dell'utente loggato
  public function mostra_utente($id_utente) 
  {
    # estrazione del nome reale sulla base dell'identificatore memorizzato in sessione
    $query = @mysql_query("SELECT nome_reale FROM Utenti WHERE id_utente = $id_utente") or die('Errore: ' . mysql_error());
    $risultato = @mysql_fetch_object($query);
    # stampa a video del nome reale dell'utente
    echo $risultato->nome_reale;
  }

  # metodo per il controllo sulla sessione
  public function verifica_sessione() 
  {
    # il metodo restituisce l'informazione relativa alla sessione a patto che questa sia stata inizializzata
    if(isset($_SESSION['login']))
    {
      return $_SESSION['login'];
    }else{
      return FALSE;
    }
  }
  
  # metodo per il logout
  # la sessione viene distrutta a seguito di uno specifico input dell'utente
  public function esci() {
    $_SESSION['login'] = FALSE;
    @session_destroy();
    }
  }
?>