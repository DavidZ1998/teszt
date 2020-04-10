<h3>Hír módosítása</h3>
<hr>
<?php
    $id = $_GET['id'];

    if (isset($_POST['modosit']))
    {
        $cim = escapeshellcmd($_POST['cim']);
        $leiras = escapeshellcmd($_POST['leiras']);

        if (empty($cim) || empty($leiras))
        {
            echo '<em>Hiba! Nem adtál meg minden adatot!</em>';
        }
        else
        {
            dbquery("UPDATE hirek SET cim='$cim', szoveg='$leiras' WHERE ID=".$id, $conn);
            header("location: index.php?pg=hireklistaja");
        }       
    }

    $hirek = dbquery("SELECT * FROM hirek WHERE ID=".$id, $conn);
    $hir = mysqli_fetch_assoc($hirek);
    echo '
    <form action="index.php?pg=hirmod&id='.$id.'" method="POST">
        <input type="text" name="cim" placeholder="A hír címe..." value="'.$hir['cim'].'">
        <br>
        <label for="leiras">Leírás:</label>
        <br>
        <textarea name="leiras">'.$hir['szoveg'].'</textarea>
        <br>
        <input type="submit" name="modosit" value="Hír módosítás">
        <br>
        <a href="index.php?pg=hireklistaja">Vissza a hírek listájára...</a>
    </form>';
?>
