<h3>Hír törlése</h3>
<hr>

<?php
    logincheck();
    $hirID = $_GET['id'];
    
    if (isset($_POST['megsem']))
    {
        header("location: index.php?pg=hireklistaja");
    }

    if (isset($_POST['torol']))
    {
        dbquery("DELETE FROM hirek WHERE ID=".$hirID, $conn);
        header("location: index.php?pg=hireklistaja");
    }

    echo 'Biztosan törlöd a hírt?
    <form action="index.php?pg=hirtorl&id='.$hirID.'" method="POST">
        <input type="submit" value="Igen" name="torol">
        <input type="submit" value="Mégsem" name="megsem">
    </form>'
?>

