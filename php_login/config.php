<?php

# definizione delle costanti per l'autenticazione al DBMS
define('DATA_HOST', 'localhost');
define('DATA_UTENTE', 'root');
define('DATA_PASS', 'root');
define('DATA_DB', 'ApuliaGo');

# classe per l'interazione con il database
class DATA_Class {
  # definizione del costruttore
  function __construct() {
    # connessione al DBMS
    $connessione = @mysql_connect(DATA_HOST, DATA_UTENTE, DATA_PASS) or die('Errore nella connessione: ' . mysql_error());
    # selezione del database
    @mysql_select_db(DATA_DB, $connessione) or die('Errore dal database: ' . mysql_error());
  }
}

?>