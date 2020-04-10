<h3>Üzenetek listája</h3>
<hr>
<?php
    logincheck();
    $uzenetek = dbquery("SELECT * FROM uzenetek ORDER BY datum DESC", $conn);
    $db = mysqli_num_rows($uzenetek);
    echo '<table class="tabla">
    <thead>
        <tr>
            <th>Dátum</th>
            <th>Küldő neve/e-mail címe</th>
            <th>Üzenet</th>
        </tr>
    </thead>
    <tbody>';


    while($uzenet = mysqli_fetch_assoc($uzenetek))
    {
        echo '<tr>
            <td>'.$uzenet['datum'].'</td>
            <td>'.$uzenet['nev'].'<br>
            '.$uzenet['email'].'</td>
            <td>'.$uzenet['uzenet'].'</td>
        </tr>';
    }


    echo '</body>
    <tfoot>
        <tr>
            <td colspan="3">Összesen: '.$db.' üzenet</td>
        </tr>
    </tfoot>
    </table>';
?>