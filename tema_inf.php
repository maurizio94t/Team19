<?php
function navH($num) {
?>
<div id="lineNav">
<div id="nav">
    <?php
    if($num==1) {
        echo '<a class="selected" href="../home.php">.Home</a>';
    }else{
        echo '<a href="../home.php">Home</a>';
    }
    if($num==2) {
        echo '<a class="selected" href="../attrazioni.php">Punti di interesse</a>';
    }else{
        echo '<a href="../attrazioni.php">Punti di interesse</a>';
    }
    if($num==3) {
        echo '<a class="selected" href="area_riservata.php">Area Riservata</a>';
    }else{
        echo '<a href="area_riservata.php">Area Riservata</a>';
    }
    if($num==4) {
        echo '<a class="selected" href="../contact.php">Contact</a>';
    }else{
        echo '<a href="../contact.php">Contact</a>';
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
    <a href="../home.php"><img src="../img/ApuliaLogo.png" /></a>
</div>

<?php
}
function footerH() {
?>


<footer class="footer-distributed">

    <div class="footer-left">

        <h3>Apulia<span> Go</span></h3>

        <p class="footer-links">
            <a href="../home.php">Home</a>
            ·
            <a href="../attrazioni.php">Punti di Interesse</a>
            ·
            <a href="area_riservata.php">Accedi</a>
            ·
            <a href="../contact.php">Contact</a>
        </p>

        <p class="footer-company-name">
            Team 19 &copy; 2015
        </p>
    </div>

    <div class="footer-center">

        <div>
            <i class="fa fa-map-marker"></i>
            <p>
                <span>Via Orabona, 4</span> Bari, Italia
            </p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p>
                +1 555 123456
            </p>
        </div>

        <div>
            <i class="fa fa-envelope"></i>
            <p>
                <a href="mailto:support@company.com">support@apuliago.com</a>
            </p>
        </div>

    </div>

    <div class="footer-right">

        <p class="footer-company-about">
            <span>About the company</span>
            Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
        </p>

    </div>

</footer>

<?php
}

function convertStr($str) {
    return iconv('cp1252', 'UTF-8', $str);  //CP1252 (Western Europe)
}
?>