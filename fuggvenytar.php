<?php
    // adatbázis kapcsolódás
    function dbconnect($dbhost, $dbname, $dbuser, $dbpass)
    {
        $link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if (!$link)
        {
            die("Hiba az adatbázis kapcsolat felépításe közben! Hibakód: ".mysqli_connect_errno());
        }
        else
        {
            mysqli_query($link, "SET NAMES utf8");
        }
        return $link;
    }

    // adatbázis lekérdezés
    function dbquery($sql, $connection)
    {
        if (!($result = mysqli_query($connection, $sql)))
        {
            die("<b>Hiba az adatbázis lekérdezés közben! </b><br><br>".$sql);
        }
        else
        {
            return $result;
        }
    }

    // számkiírás   
    function szamkiir($szam)
    {
        return number_format($szam, $GLOBALS['tizedes'], $GLOBALS['tizedes_elv'], $GLOBALS['ezres_elv']);
    }


    // belső oldalak védelme
    function logincheck()
    {
        // ha nem létezik a munkamenet változó visszairányítjuk a főoldalra
        if (!isset($_SESSION['uID']))
        {
            header("location: index.php");
        }
    }
?>