<?php
// Functie: Algemene functies voor 'main_bieren.php'.
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

// Function 'OvzBieren' print het overzicht van de bieren.
function GetData($conn, $table){
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function 'OvzBieren' print het overzicht van de bieren.
function OvzBieren($conn){

    $result = GetData($conn, "bier");

    echo "Overzicht van alle bieren: ";
    echo "<br>";
    echo "<br>";

    echo"<table>";
    echo "<tr>";
        echo "<td>" . "Bier Code" . "</td>";
        echo "<td>" . "Bier Naam" . "</td>";
        echo "<td>" . "Soort" . "</td>";
        echo "<td>" . "Stijl" . "</td>";
        echo "<td>" . "Alcohol %" . "</td>";
    echo "</tr>";
    foreach($result as $data) {
        echo "<tr>";
            echo "<td>" . $data["biercode"] . "</td>";
            echo "<td>" . $data["naam"] . "</td>";
            echo "<td>" . $data["soort"] . "</td>";
            echo "<td>" . $data["stijl"] . "</td>";
            echo "<td>" . $data["alcohol"] . "</td>";
        echo "</tr>";
    }
    echo"<table>";
    echo "<br>";
}

function Brouwers($conn){
    $result = GetData($conn, "brouwer");

    echo "Overzicht van alle brouwers: ";
    echo "<br>";
    echo "<br>";

    echo"<table>";
    echo "<tr>";
        echo "<td>" . "Brouwcode" . "</td>";
        echo "<td>" . "Naam" . "</td>";
        echo "<td>" . "Land" . "</td>";
    echo "</tr>";
    foreach($result as $data) {
        echo "<tr>";
            echo "<td>" . $data["brouwcode"] . "</td>";
            echo "<td>" . $data["naam"] . "</td>";
            echo "<td>" . $data["land"] . "</td>";
        echo "</tr>";
    }
    echo"<table>";
    echo "<br>";
}

?>