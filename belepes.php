<h3>Belépés</h3>

<?php
    // ha még nem vagyunk bejelentkezve
    if (!isset($_SESSION['uID']))
    {
        // rákattintottunk-e a belépés gombra?
        if (isset($_POST['login']))
        {
            $email = escapeshellcmd($_POST['email']);
            $jelszo = escapeshellcmd($_POST['password']);

            // ha nem adtuk meg az adatokat
            if (empty($email) || empty($jelszo))
            {
                echo '<em>Hiba! Nem adtál meg minden adatot!</em>';
            }
            else
            {
                // a megadott e-mail cím szerepel-e már a felhasználók táblában
                $result = dbquery("SELECT * FROM 513a_kaveoldal WHERE email='$email'", $conn);
                if (mysqli_num_rows($result) == 0)
                {
                    echo '<em>Hiba! Nem regisztrált e-mail cím!</em>';
                }
                else
                {
                    $user = mysqli_fetch_assoc($result);
                     //nem tiltott felhasználó akar-e bejelntkezni
                    if ($user['statusz'] == 0)
                    {
                        echo '<em>Hiba! Tiltott felhasználó</em>';
                    }
                    else
                    {
                        // ha nem stimmel a megadott jelszó
                        if ($user['jelszo'] != MD5($jelszo))
                        {
                            echo '<em>Hiba! Rossz jelszó!</em>';
                        }
                        else
                        {
                            // ha minden ok, akkor lementjük a bejelentkezni kívát felhasználó azonosítóját
                            // egy munkamenet változóba
                            $_SESSION['uID'] = $user['ID'];
                            $_SESSION['uName'] = $user['nev'];
                            $_SESSION['uMail'] = $user['email'];
                            header("location: index.php");
                        }
                    }

                }
            }
        }


        // ha rákattintottunk a regisztráció gombra
        if (isset($_POST['reg']))
        {
            // átirnyítjuk a címsort a regisztrációra (url)
            header("location: index.php?pg=regisztracio");
        }

        echo '
        <form method="POST" action="index.php">
        <input type="email" name="email" placeholder="E-mail cím">
        <input type="password" name="password" placeholder="Jelszó">
        <input type="submit" value="Belépés" name="login">
        <input type="submit" value="Regisztráció" name="reg">
        </form>';
    }
    else
    {
        // ha már be vagyunk jelentkezve

        if (isset($_POST['logout']))
        {
            unset($_SESSION['uID']);
            unset($_SESSION['uName']);
            unset($_SESSION['uMail']);
            header("location: index.php?pg=regisztracio");
        }


        echo '<h3>Belépve</h3>';
        echo $_SESSION['uName'];
        echo '
        <form method="POST" action="index.php">
          <input type="submit" value="Kilépés" name="logout">
        </form>';
        include('adminmenu.php');
    }
?>
