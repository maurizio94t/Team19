<?php

define('DATA_HOST', 'localhost');
define('DATA_UTENTE', 'root');
define('DATA_PASS', 'root');
define('DATA_DB', 'ApuliaGo');

class DATA_Class {
  function __construct() {
    $connessione = @mysql_connect(DATA_HOST, DATA_UTENTE, DATA_PASS) or die('Errore nella connessione: ' . mysql_error());
    @mysql_select_db(DATA_DB, $connessione) or die('Errore dal database: ' . mysql_error());
  }
}

?>