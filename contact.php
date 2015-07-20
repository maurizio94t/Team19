<?php
include_once ('tema.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Contact-ApuliaGo</title>
		
		<?php navH(4); ?>
		<?php logoH(); ?>
		<link rel="stylesheet" href="styleContact.css">
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
		
	function LoadGmaps() {
		var myLatlng = new google.maps.LatLng(41.109725,16.881473);
		var myOptions = {
			zoom: 16,
			center: myLatlng,
			disableDefaultUI: true,
			panControl: true,
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.DEFAULT
			},

			mapTypeControl: true,
			mapTypeControlOptions: {
				style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
			},
			streetViewControl: true,
			mapTypeId: google.maps.MapTypeId.ROADMAP
			}
		var map = new google.maps.Map(document.getElementById("MyGmaps"), myOptions);
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title:"Via orabona 4, bari"
		});
	}
</script>


	</head>
	<body onload="LoadGmaps()" onunload="GUnload()">

<div id="MyGmaps" style="width:auto;height:400px;border:1px solid #CECECE;"></div>

		
		
		<article id="description">
<h2>Dove siamo</h2>
<p>
Il nostro ufficio si trova nel dipartimento di Informatica dell' Università di Bari. 

</p>
<p>
Potrai trovarci lì dal Lunedì al Venerdì dalle 9 alle 18. Vienici a trovare! ;)
</p>

<p>
<span style= "color: #9BA500"> Indirizzo: </span> Via Edoardo Orabona, 4 70126 Bari BA
</p>
<span style= "color: #9BA500">Telefono: </span> 080 5347698
<p>
<span style= "color: #9BA500">E-mail: </span> <a href="mailto:support@apuliago.com">support@apuliago.com </a> 
</p>			

</article>
			
			
		<section id="contact-form">
  <h2>Contattaci</h2>
  <form id="contact" name="contact" accept-charset="utf-8">
    <label><span>Nome</span><input name="name" type="text" placeholder="Name"/></label>
    <label><span>Email</span><input name="email" type="email" placeholder="Email"/></label>
    <label><span>Messaggio</span><textarea name="message" placeholder="Message"></textarea></label>
    <input name="submit" type="submit" value="Send"/>
  </form>
  
  
  <aside>
    <p>Dubbi? Compila pure il form e inviaci la tua domanda.</p>
    <p>I membri del Team19 ti risponderanno nel più breve tempo possibile.</p>
  </aside>
</section>



<?php footerH(); ?>
</div>
	</body>
</html>
