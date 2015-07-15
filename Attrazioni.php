<?php
include_once ('tema.php');
include_once ('configDB.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Punti di interesse</title>

		<link rel="stylesheet" href="styleAttrazioni.css">

	</head>
	<body>

		<div id="container">
			<?php navH(2); ?>
			<?php logoH(); ?>

			<div id="mes-full">
				<!--Punti di interesse-->
			</div>

			<div id="content">

				<?php
				
				function ridimensionaDescrizione($text) {
                     $array_text = explode(" ", $text);
                     $new_array = array();
                     for ($i=0; $i < 55; $i++) { 
                         $new_array[$i] = $array_text[$i];
                     }
                     $text = implode(" ", $new_array);
                     return $text." ...";
				}
                
				
                mysql_connect(DATA_HOST, DATA_UTENTE, DATA_PASS) or die(mysql_error());
                mysql_select_db(DATA_DB) or die(mysql_error());

                //codice per Testo descrizione
                $query = "SELECT Cod,Nome,Descrizione,Img FROM PuntiDiInteresse";
                $result = mysql_query($query);
                $num_rows = mysql_num_rows($result);
                
                if ($result && mysql_num_rows($result) > 0) {
                    $cnt = 0;
                    while ($row = mysql_fetch_assoc($result)) {
                        $cnt += 1;
                        if($num_rows == $cnt) {
                            $class_name = "articolo last";
                        } else {
                            $class_name = "articolo";
                        }
                        $Descrizione = ridimensionaDescrizione($row['Descrizione']);
                        echo "<a href='puntodiinteresse.php?Cod=" . $row['Cod'] . "'>
                        <div class='" . $class_name . "'>
                        <img src='img/" . $row['Img'] . "' />
                        <h2>" . convertStr($row['Nome']) . "</h2>
                        <p>" . convertStr($Descrizione) . "</p>
                        </div></a>";
                    }
                } else
                    echo "nessun risultato";

				?>
			</div>

			<div id="sidebar">
				<h2>I pi&ugrave; cliccati:</h2>
				<ul>
					<li>
						<a href="puntodiinteresse.php?Cod=10">Tour in Bici</a>
					</li>
					<li>
						<a href="puntodiinteresse.php?Cod=3">Grotte di Castellana</a>
					</li>
					<li>
						<a href="puntodiinteresse.php?Cod=9">Tour in Barca</a>
					</li>
					<li>
						<a href="puntodiinteresse.php?Cod=5">Castel Del Monte</a>
					</li>
				</ul>
			</div>

			<div class="clear"></div>

			<?php footerH(); ?>
		</div>

	</body>
</html>