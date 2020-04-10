<h3>Új hír felvétele</h3>
<hr>
<?php
    logincheck();
    if (isset($_POST['felvesz']))
    {
        $cim = escapeshellcmd($_POST['cim']);
        $leiras = escapeshellcmd($_POST['leiras']);
        if (empty($cim) || empty($leiras))
        {
            echo '<em>Hiba! Nem adtál meg minden adatot!</em>';
        }
        else
        {
            dbquery("INSERT INTO hirek VALUES(null, CURRENT_TIMESTAMP, '$cim','$leiras')", $conn);
            header("location: index.php?pg=hireklistaja");
        }
    }

?>
<form action="index.php?pg=ujhir" method="POST">
    <input type="text" name="cim" placeholder="A hír címe...">
    <br>
    <label for="leiras">Leírás:</label>
    <br>
    <textarea name="leiras"></textarea>
    <br>
    <input type="submit" name="felvesz" value="Hír felvétele">
    <br>
    <a href="index.php?pg=hireklistaja">Vissza a hírek listájára...</a>
</form>