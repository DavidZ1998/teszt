<h3>Kávégépeink</h3>
<hr>
<?php
    $sql = "SELECT * FROM gepek";
    $gepek = dbquery($sql, $conn);
    $db = mysqli_num_rows($gepek);
    echo '<table class="tabla">
    <thead>
        <tr>
            <th>Kép</th>
            <th>Gyártó</th>
            <th>Típus</th>
            <th>Ár</th>
        </tr>
    </thead>
    <tbody>';


    while($gep = mysqli_fetch_assoc($gepek))
    {
        echo '<tr>
            <td>'.$gep['kep'].'</td>
            <td>'.$gep['gyarto'].'</td>
            <td>'.$gep['tipus'].'</td>
            <td class="r">'.szamkiir(($gep['ar']*$szorzo)).' '.$penznem.'</td>
        </tr>';
    }


    echo '</body>
    <tfoot>
        <tr>
            <td colspan="4">Összesen: '.$db.' gép</td>
        </tr>
    </tfoot>
    </table>';
?>