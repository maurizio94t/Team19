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

		<link rel="stylesheet" href="stylePunto.css">

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
				
				$Cod=$_GET["Cod"];
                $query="SELECT Nome,NomeP,Descrizione,Img,Prezzo FROM PuntiDiInteresse WHERE Cod='$Cod'";
                $res=mysql_query($query);
                if($res&&mysql_num_rows($res)>0) {
                    while($row=mysql_fetch_assoc($res)) {
                        $Nome = convertStr($row['Nome']);
                        $NomeP = $row['NomeP'];
                        $Img = "<div class='box'> <img src='img/" . $row['Img'] . "' alt='Errore: immagine non trovata!' style='float:left;'/> </div>";
                        $Descrizione = convertStr($row['Descrizione']);
                        $Prezzo = $row['Prezzo'];
                    }
                } else {
                    $Nome = "nessun risultato";
                }
				print("<p><h3>$Nome</h3></p>");
				?>
			</div>
			<div id="mes-full">
				<?php
				
				echo $Img;
				echo $Descrizione;
				?>
				
				<script type="text/javascript">
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
        function initialize(){
            
            var latlng = new google.maps.LatLng(<?php echo $Lati; ?>,<?php echo $Long; ?>);
            var myOptions= {
                zoom:12,
                center:latlng,
                mapTypeId:google.maps.MapTypeId.ROADMAP,
                mapTypeControlOptions: {
                    style:google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                }
            }
            mymap=new google.maps.Map(document.getElementById("map"),myOptions);
            var myLatlng=new google.maps.LatLng(<?php echo $Lati; ?>,<?php echo $Long; ?>);

            var marker=new google.maps.Marker({
                position:myLatlng,map:mymap,
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
        
        function controllaData() {
            var dataI = document.getElementById("dataI").value;
            var dataF = document.getElementById("dataF").value;
            var persone = document.getElementById("persone").value;
            var dataIS = dataI.toString();
            var dataIF = dataF.toString();
            
            var info_msg = document.getElementById("info_msg");
            
            if(dataIS>dataIF || !dataIS || !dataIF) {
                info_msg.innerHTML="Errore inserimento data!";
            } else {
                info_msg.innerHTML="Prenotazione in corso...";
                setTimeout(window.location.replace("formPrenotazione.php?Cod="+ <?php echo $Cod; ?> +"&DI="+dataIS+"&DF="+dataIF+"&Persone="+persone),5000);
            }
        }
        </script>
				<h6>
				<form name="formData">
					<p>
						<b>Data iniziale:</b>
						<input type=date id="dataI" name="dataI">
					</p>
					<p>
						<b>Data finale:&nbsp;&nbsp;</b>
						<input type=date id="dataF" name="dataF">
					</p>
					<p>
                        <b>Adulti:&nbsp;&nbsp;</b>
                        <select id="persone" name="persone">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </p>
				    <input type=button id="tasto" name="tasto" value="Prenota!" onClick="controllaData();">
				    <p id="info_msg"></p>
				</form>
				</h6>
				
				<div id="map" style="margin-left:auto; margin-right:10px; width:400px; height:400px; border:1px solid black; margin-top: 5%;"></div>
			</div>

			<?php footerH(); ?>
	</body>

</html>