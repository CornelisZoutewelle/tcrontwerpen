<?php
// Functie: Algemene functies voor 'main_brouwers.php'.
// Auteur: Cornelis Zoutewelle

// Function 'ConnectDb' connect de database.
function ConnectDb(){
    try{
        $conn = new PDO("mysql:host=localhost;dbname=bieren", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        echo "Connected!";
    } 
    
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}

// Function 'GetData' haalt de data uit de database.
function GetData($table){
    $conn = ConnectDb();

    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function 'Table' weergeeft de data die je opvraagd.
function PrintTable($result){
    echo "<table border = 1px>";
    echo "<tr>";
    foreach($result[0] as $column_name => $cell){
        echo "<th>".$column_name."</th>";
    }
    echo "</tr>";
    foreach ($result as $row) {
        
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . $cell . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

// Function 'GetBrouwers' selecteert data van brouwers.
function GetBrouwers(){
    $result = GetData("brouwer");

    echo "Overzicht van alle brouwers: ";

    echo "<br>";
    echo "<br>";

    PrintTable($result);
}

// Function 'GetBieren' selecteert data van bieren.
function GetBieren(){
    $result = GetData("bier");

    echo "Overzicht van alle bieren: ";

    echo "<br>";
    echo "<br>";

    PrintTable($result);
}

?>