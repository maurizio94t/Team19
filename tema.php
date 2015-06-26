<?php
function navH($num) {
?>
<div id="lineNav">
<div id="nav">
    <?php
    if($num==1) {
        echo '<a class="selected" href="home.php">Home</a>';
    }else{
        echo '<a href="home.php">Home</a>';
    }
    if($num==2) {
        echo '<a class="selected" href="Attrazioni.php">Punti di interesse</a>';
    }else{
        echo '<a href="Attrazioni.php">Punti di interesse</a>';
    }
    if($num==3) {
        echo '<a class="selected" href="#">Contact</a>';
    }else{
        echo '<a href="#">Contact</a>';
    }
    if($num==4) {
        echo '<a class="selected" href="#">About</a>';
    }else{
        echo '<a href="#">About</a>';
    }
    ?>
</div>
</div>

<?php
}
function tag_lineH() {
?>

<div id="tag_line">
    Love the land. Live the life.
</div>

<?php
}
function logoH() {
?>

<div id="logo">
    <img src="img/ApuliaLogo.png" />
</div>

<?php
}
function footerH() {
?>

<div id="footer">
	<dl>
		<dt>
			Creato da
		</dt>
		<dd>
			<address>
				<a href="mailto:ApuliaGo@gmail.com">Apulia Go</a>
			</address>
		</dd>
		<dt>
			Ultimo aggiornamento
		</dt>
		<dd>
			<time datetime="2015-05-16" pubdate>
				Venerdì 16 Maggio
			</time>
		</dd>
		<dd>
	</dl>
	<small>Tutti i contenuti sono prottetti dalla licenza creative commons</small>
	<small>©2015 Gruppo19 - Design by T2J</small>
</div>

<?php
}
?>