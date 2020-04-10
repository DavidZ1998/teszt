<h3>Regisztráció</h3>
<hr>
<?php
    // ha rákattintott a regist gombra
    if (isset($_POST['regist']))
    {
        // átvesszük az INPUT mezők tartalmát és megtisztítjuk az escape karakterektől
        $nev = escapeshellcmd($_POST['nev']);
        $email =  escapeshellcmd($_POST['email']);
        $jelszo1 = escapeshellcmd($_POST['jelszo1']);
        $jelszo2 = escapeshellcmd($_POST['jelszo2']);

        // megadott-e minden adatot  (ALTGR+W = |)
        if (empty($nev) || empty($email) || empty($jelszo1) || empty($jelszo2))
        {
            echo '<em>Hiba! Nem adtál meg minden adatot!</em>';
        }
        else
        {
            // ha nem egyeznek a jelszavak
            if ($jelszo1 != $jelszo2)
            {
                echo '<em>Hiba! Nem egyeznek a megadott jelszavak!</em>';
            }
            else
            {
                // van-e már ilyen regisztráció
                $result = dbquery("SELECT * FROM 513a_kaveoldal WHERE email='$email'", $conn);
                if (mysqli_num_rows($result) != 0)
                {
                    echo '<em>Hiba! Van már ilyen e-mail címmel regisztráció!</em>';
                }
                else
                {
                    // MD5-tel lekódoljuk a jelszót
                    $jelszo1 = MD5($jelszo1);
                    dbquery("INSERT INTO 513a_kaveoldal VALUES(
                        null,
                        '$nev',
                        '$email',
                        '$jelszo1',
                        CURRENT_TIMESTAMP,
                        1)", $conn);
                    echo 'A regisztráció sikeres!';
                }
            }

        }
    }
?>
<form method="POST" action="index.php?pg=regisztracio">
    <input type="text" name="nev" placeholder="Felhasználónév"><br>
    <input type="email" name="email" placeholder="E-mail cím"><br>
    <input type="password" name="jelszo1" placeholder="Jelszó"><br>
    <input type="password" name="jelszo2" placeholder="Jelszó megerősítés"><br><br>
    <input type="submit" value="Regisztráció elküldése" name="regist">
</form>