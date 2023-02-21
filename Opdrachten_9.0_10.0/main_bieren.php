<?php
// Functie: Overzicht bieren.
// Auteur: Cornelis Zoutewelle

// Initialisatie.
include 'functions.php';

// Connect Database.
$conn = ConnectDb();

// Printen overzicht van bieren.
OvzBieren($conn);

// Printen overzicht van brouwers.
Brouwers($conn)

?>

<!----- HTML Table Style ----->
<style type="text/css">
    table {
        border-collapse: collapse;
        border: 1px solid black;
    }
    td {
        border: 1px solid black;
        width: 100px;
}
</style>