<h3>Hírek kezelése</h3>
<hr>
<?php
    logincheck();
    echo '<a href="index.php?pg=ujhir">Új hír felvétele...</a>';

    $hirek = dbquery("SELECT * FROM hirek ORDER BY datum DESC", $conn);
    $db = mysqli_num_rows($hirek);
    echo '<table class="tabla">
    <thead>
        <tr>
            <th>Dátum</th>
            <th>Cím</th>
            <th>Műveletek</th>
        </tr>
    </thead>
    <tbody>';


    while($hir = mysqli_fetch_assoc($hirek))
    {
        echo '<tr>
            <td>'.$hir['datum'].'</td>
            <td>'.$hir['cim'].'</td>
            <td class="r">
                <a href="index.php?pg=hirmod&id='.$hir['ID'].'">módosítás</a>
                &nbsp;
                <a href="index.php?pg=hirtorl&id='.$hir['ID'].'">törlés</a>
            </td>
        </tr>';
    }


    echo '</body>
    <tfoot>
        <tr>
            <td colspan="3">Összesen: '.$db.' hír</td>
        </tr>
    </tfoot>
    </table>';
?>

