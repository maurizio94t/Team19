<?php
include_once ('tema.php');
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
				Punti di interesse
			</div>

			<div id="content">
			    <a href="#"><div class="articolo">
					<img src="http://www.marchettidesign.net/demo/pagina-web-html-css/img/times-square.jpg" />
					<h2>Titolo dell' articolo</h2>
					<p>
						Testo dell'articolo, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</p>
				</div></a>

                <a href="#"><div class="articolo">
                    <img src="http://www.marchettidesign.net/demo/pagina-web-html-css/img/times-square.jpg" />
                    <h2>Titolo dell' articolo</h2>
                    <p>
                        Testo dell'articolo, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div></a>

				<a href="#"><div class="articolo last">
					<img src="http://www.marchettidesign.net/demo/pagina-web-html-css/img/times-square.jpg" />
					<h2>Titolo dell' articolo</h2>
					<p>
						Testo dell'articolo, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</p>
				</div></a>

			</div>

			<div id="sidebar">
				<h2>I più cliccati:</h2>
				<ul>
					<li>
						<a href="#">Trulli di Alberobello</a>
					</li>
					<li>
						<a href="#">Putignano</a>
					</li>
					<li>
						<a href="#">Grotte di Castellana</a>
					</li>
					<li>
						<a href="#">CampannelloTown</a>
					</li>
				</ul>
			</div>

			<div class="clear"></div>

			<?php footerH(); ?>

		</div>

	</body>
</html>