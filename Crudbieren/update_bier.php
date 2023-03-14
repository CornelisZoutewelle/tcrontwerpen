<?php
    require_once('functions.php');
    echo "<h1>Update Bier</h1>";

    echo "Data uit het vorige formulier: <br>";
    
    $row = GetBier($_GET['biercode']);
?>

<html>
    <body>
        <br>
        <br>
        Biercode: <input type="" name="biercode" value="<?php echo $_GET['biercode']; ?>"><br>
        Naam: <input type="" name="naam" value="<?= $row['naam']?>"><br>
        Soort: <input type="text" name="soort" value="<?= $row['soort']?>"><br>
        Stijl: <input type="text" name="stijl" value="<?= $row['stijl']?>"><br>
        Alcohol: <input type="text" name="alcohol" value="<?= $row['alcohol']?>"><br>
        Brouwcode: <input type="text" name="brouwcode" value="<?= $row['brouwcode']?>"><br><br>

        <input type="submit" name="btn_wzg" value="Wijzigen">
    </body>
</html>