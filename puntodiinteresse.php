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

		<!--mappa google-->

		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&language=it"></script>

		<?php
		mysql_connect(DATA_HOST,DATA_UTENTE,DATA_PASS) or die(mysql_error());
		mysql_select_db(DATA_DB) or die(mysql_error());
		?>
	</head>
	<body onload="initialize()">

		<div id="container">
			<?php navH(2); ?>

			<?php logoH(); ?>

			<div id="titolo">
				<?php
				//TITOLO
				$Cod=$_GET["Cod"];//codice per Testo descrizione
                $query="SELECT Nome,Descrizione,Img FROM PuntiDiInteresse WHERE Cod='$Cod'";
                $res=mysql_query($query);
                if($res&&mysql_num_rows($res)>0) {
                    while($row=mysql_fetch_assoc($res)) {
                        $Nome = $row['Nome'];
                        $Img = "<div class='box'> <img src='img/" . $row['Img'] . "' alt='Errore: immagine non trovata!' style='float:left;'/> </div>";
                        $Descrizione = $row['Descrizione'];
                    }
                } else
                    $Nome = "nessun risultato";
				print("<p><h3>$Nome</h3></p>");
				?>
			</div>
			<!-- codice visualizzazione descrizione-->
			<div id="mes-full">
				<?php
				
				echo $Img;
				echo $Descrizione;
				?>
				
				<!--inizio mappa-->
				<script type="text/javascript">
        
        function initialize(){
            <?php
                $query="SELECT Latitudine,Longitudine FROM PuntiDiInteresse WHERE Cod='$Cod'";
                $res=mysql_query($query);
                if($res&&mysql_num_rows($res)>0) {
                    while($row=mysql_fetch_assoc($res)) {
                        $Lati = $row['Latitudine'];
                        $Long = $row['Longitudine'];
                    }
                }
            ?>
            var latlng = new google.maps.LatLng(<?php echo $Lati; ?>,<?php echo $Long; ?>);
            var myOptions= {
                zoom:14,center:latlng,mapTypeId:google.maps.MapTypeId.HYBRID,mapTypeControlOptions: {
                    style:google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                }
            }
            mymap=new google.maps.Map(document.getElementById("map"),myOptions);
            var myLatlng=new google.maps.LatLng(<?php echo $Lati; ?>,<?php echo $Long; ?>);
            // segnapunto
            // definizione segnapunto
            var marker=new google.maps.Marker({
                position:myLatlng,map:mymap,
            });
        }
        </script>
        <!--fine mappa-->
				
				<h5>Prenota subito!</h5>
				<h6>
				<form name="formData">
					<p>
						<b>Data iniziale:</b>
						<input type="Text" name="data1" value="">
					</p>
					<p>
						<b>Data finale:&nbsp;&nbsp;</b>
						<input type="Text" name="data2" value="">
					</p>
				</form>
				<form action="prenotazione.php">
					<input type="button" value="Invia la prenotazione" name="button">
				</h6>
				</form>

				<div id="map" style="margin-left:auto; margin-right:10px; width:400px; height:400px; border:1px solid black; margin-top: 5%;"></div>
			</div>

			<?php footerH(); ?>
	</body>

</html>