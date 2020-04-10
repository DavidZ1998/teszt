<h3>Kapcsolat</h3>
<hr>

<?php
    if (isset($_POST['kuldes']))
    {
        $nev = escapeshellcmd($_POST['nev']);
        $email = escapeshellcmd($_POST['email']);
        $uzenet = escapeshellcmd($_POST['uzenet']);

        if (empty($nev) || empty($email) || empty($uzenet))
        {
            echo '<em>Hiba! Nem adtál meg minden adatot!</em>';
        }
        else
        {
            dbquery("INSERT INTO uzenetek VALUES(null, CURRENT_TIMESTAMP,'$nev','$email','$uzenet')", $conn);
            echo 'Az üzenetet elküldtük!<br><br>';
        }
    }
?>

<p>Amennyiben kérdése van, írjon nekünk! Kollégáink állnak rendelkezésére...</p>
<form action="index.php?pg=kapcsolat" method="post">
    <input type="text" name="nev" placeholder="Név"><br>
    <input type="email" name="email" placeholder="E-mail cím"><br>
    <label for="uzenet">Üzenet:</label><br>
    <textarea name="uzenet" cols="70" rows="30"></textarea>
    <input type="submit" value="Üzenet küldése" name="kuldes">
</form>