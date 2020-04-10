<h3>Jelszó módosítás</h3>
<hr>
 
<?php
    logincheck();
    
    if (isset($_POST['modosit']))
    {
        $oldpass = escapeshellcmd($_POST['oldpass']);
        $newpass1 = escapeshellcmd($_POST['newpass1']);
        $newpass2 = escapeshellcmd($_POST['newpass2']);

        if (empty($oldpass) || empty($newpass1) || empty($newpass2))
        {
            echo '<em>Hiba! Nem adtál meg minden adatot!</em>';
        }
        else
        {
            if ($newpass1 != $newpass2)
            {
                echo '<em>Hiba! A megadott új jelszavak nem egyeznek!</em>';
            }
            else
            {
                $result = dbquery("SELECT jelszo FROM 513a_kaveoldal WHERE ID=".$_SESSION['uID'],  $conn);
                $user = mysqli_fetch_assoc($result);
                if ($user['jelszo'] != MD5($oldpass))
                {
                    echo '<em>Hiba! A megadott jelenlegi jelszó hibás!</em>';
                }
                else
                {
                    $newpass1 = MD5($newpass1);
                    dbquery("UPDATE 513a_kaveoldal SET jelszo = '$newpass1' WHERE ID=".$_SESSION['uID'], $conn);
                    echo 'A jelszó módosult!';
                }
            }
        }
    }
?>

<form action="index.php?pg=jelszomod" method="POST">
    <input type="password" name="oldpass" placeholder="Jelenlegi jelszó...">
    <br>
    <input type="password" name="newpass1" placeholder="Új jelszó...">
    <br>
    <input type="password" name="newpass2" placeholder="Új jelszó megerősítése...">
    <br><br>
    <input type="submit" value="Módosítás" name="modosit">
</form>