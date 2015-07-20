<?php
include_once ('tema.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ApuliaGo</title>

		<link rel="stylesheet" href="styleHome.css">

		<link rel="stylesheet" href="Nivo-Slider-master/nivo-slider.css" type="text/css" media="screen" />
		<!-- Include the theme stylesheet in the <head> section -->
		<link rel="stylesheet" href="Nivo-Slider-master/themes/default/default.css" type="text/css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
		<script src="Nivo-Slider-master/jquery.nivo.slider.pack.js" type="text/javascript"></script>

		<script type="text/javascript">
			$(window).load(function() {
				$('#slider').nivoSlider({
					controlNav : false
				});
			});
		</script>

	</head>
	<body>

		<div id="container">
			<?php navH(1); ?>
			<div class="slider-wrapper theme-default">
				<div id="slider" class="nivoSlider">
					<img src="img/puglia1modified.png" alt="" />
					<img src="img/puglia2modificata.jpg" alt="" />
					<img src="img/bruchetta2modified.jpg" alt="" />
					<img src="img/party.jpg" alt="" />
				</div>
				<?php tag_lineH(); ?>
			</div>

			<?php logoH(); ?>

			<div class="greenStrip">
			    <h1 align="center"> SERVIZI </h1>
				<div id="descrizione">
					Che tu stia viaggiando in Puglia per lavoro o per piacere, faremo in modo che sia un’ esperienza che ricorderai per sempre.
					il nostro servizio innovativo mira a fornire ai nostri clienti un’ opportunità unica per esplorare la Puglia. Scopri i nostri pacchetti…
					<br><br>Clicca uno dei nostri pacchetti per  filtrare la ricerca!
				</div>
				<div class="items-eviG">
					<div class="item-eviG">
						<a href="attrazioni.php?cat=CB"><img src="img/CAT1.svg" alt="errore" width="100%"/></a>
						<h5 align="center"> Vedi che ti mangi </h5>
						<div class= "info">
							La Puglia è una terra eterogenea e geograficamente variegata. Dalla penisola del Gargano fino alle province di Lecce e Taranto,
							l’uomo e la natura hanno creato le condizioni per la nascita dei prodotti tipici gustati oggi in tutto il mondo.
						</div>
					</div>
					<div class="item-eviG">
						<a href="attrazioni.php?cat=SV"><img src="img/CAT2.svg" alt="errore" width="100%"/></a>
						<h5 align="center"> A gradire </h5>
						<div class= "info">
							Chi sceglie la Puglia, sceglie il divertimento. Vivace, ricca di proposte d’intrattenimento, la Puglia non si ferma mai.
							Offre divertimenti e svago per tutti i gusti e per tutte le età. Chi viaggia in famiglia troverà tante soluzioni per passare giornate in allegria: non solo spiaggia,
							ma anche gite in bicicletta o nell’entroterra.
						</div>
					</div>
					<div class="item-eviG">
						<a href="attrazioni.php?cat=ESP"><img src="img/CAT3.svg" alt="errore" width="100%"/></a>
						<h5 align="center"> Vai mo vai </h5>
						<div class= "info">
							Per conoscere la Puglia bisogna percorrerla... questo è l’obiettivo del pacchetto Vai Mo che con la nostra esperienza vi condurrà negli itinerari più segreti
							e meno scontati per i quali turismo e natura sono sempre all’altezza delle vostre aspettative di viaggio.
						</div>
					</div>
				</div>
			</div>

			<div class="clear"></div>

			<section class="aboutStrip">

				<div class= 'description'>
					<h1>TI STARAI CHIEDENDO CHI SIAMO...</h1>
					<p>
						Ciao, siamo il Team 19, ovvero tre studenti di Informatica nati e cresciuti in Puglia e con una grande passione per la nostra terra.
						Così, qualche tempo fa abbiamo deciso di unire questa passione alle nostre conoscenze, e creare un servizio che desse l' opportunità
						di vivere il territorio a chi non ha la nostra fortuna.

					</p>

				</div>

				<article class="profile">
					<img src="img/Ale.jpg" alt="" />
					<h4>Alessandro Campanello</h4>
					<p>
						Chief Infrastructure Planner
					</p>

				</article>

				<article class ="profile">

					<img src="img/Maury.jpg" alt="" />
					<h4>Maurizio Troiani</h4>
					<p>
						Investor Marketing Manager
					</p>
				</article>

				<article class="profile">
					<img src="img/Giuse.jpg" alt="" />
					<h4>Giuseppe De Marzo</h4>
					<p>
						Dynamic Communications Technician
					</p>
				</article>

			</section>

			<?php footerH(); ?>
		</div>

	</body>
</html>
