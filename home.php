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

			<!--
			<div id="autenticazione" align="right">
			<form method="POST" action="php_login/autenticazione.php" id="form_autenticazione" name="autenticazione">
			<label>Username/email</label>
			<input type="text" name="email_o_nome_utente" />
			<label>Password</label>
			<input type="password" name="password" id="password" />
			<input type="submit" name="invio_dati" value="Invia"/>
			<br/>
			<label><a href="php_login/iscrizione.php" title="Registrazione">Se non sei registrato puoi farlo adesso</a></label>
			</form>
			</div>
			-->

			<div class="slider-wrapper theme-default">
				<div id="slider" class="nivoSlider">
					<img src="img/a.jpg" alt="" title="Escursioni in mountain bike.."/>
					<img src="img/b.jpg" alt="" title="Top-trekking" />
					<img src="img/c.jpg" alt="" title="La favolosa Polignano a mare" />
					<img src="img/d.jpg" alt="" title="Vieste" />
				</div>
				<?php tag_lineH(); ?>
			</div>

			<?php logoH(); ?>

            
            <div id="greenStrip">
                <div id="mes-full">
                    Punti di interesse
                </div>
                <div class="items-eviG">
                    <div class="item-eviG">
                        <img src="img/a.jpg" alt="errore" width="100%"/>
                    </div>
                    <div class="item-eviG">
                        <img src="img/a.jpg" alt="errore" width="100%"/>
                    </div>
                    <div class="item-eviG">
                        <img src="img/a.jpg" alt="errore" width="100%"/>
                    </div>
                </div>
            </div>
            
			<div class="items-evi-row">
				<div class="item-evi">
					AAA
				</div>
				<div class="item-evi">
					AAA
				</div>
			</div>

			<div class="clear"></div>

			<?php footerH(); ?>
		</div>

	</body>
</html>
