<h3>Aktuális híreink</h3>
<hr>
<?php
    $sql = "SELECT * FROM hirek ORDER BY datum DESC";
    $hirek = dbquery($sql, $conn);

    while($hir = mysqli_fetch_assoc($hirek))
    {
        echo '<h4>'.$hir['datum'].': '.$hir['cim'].'</h4><p>'.nl2br($hir['szoveg']).'</p><hr>';
    }
?>