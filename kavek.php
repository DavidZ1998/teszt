<h3>Kévék</h3>
<hr>
<?php
    $kavek = dbquery("SELECT * FROM kavek", $conn);
    while($kave = mysqli_fetch_assoc($kavek))
    {
        echo '<h4>'.$kave['kavenev'].': </h4><p>'.nl2br($kave['leiras']).'</p>Származási hely: '.$kave['szarmhely'].'<br>
        Ára: '.szamkiir(($kave['ar'] * $szorzo)).' '.$penznem.'<hr>';

    }

    
?>