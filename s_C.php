<?php
require("includes/open_database.php");
$s = $_GET["search"];
$s =  '"%' . $s . '%"';

$sql = 'SELECT * FROM Kurs WHERE kurskod LIKE ' . $s . ' OR Kursnamn LIKE ' . $s . ' OR  Anmälningskod LIKE ' . $s .' OR Hastighet LIKE ' . $s . ' OR  Högskolepoäng LIKE ' . $s .' OR  Datum LIKE ' . $s;
  $result = $conn->query($sql);
//echo $sql;
    if ($result->num_rows > 0) {

        echo '<table class="table table-bordered table-hover" id="myTable">';
        echo '<thead><tr><th>Kurskod</th><th>Kursnamn</th><th>Anmälningskod</th><th>Hastighet</th><th>Högskolepoäng</th><th>Datum</th></tr></thead><tbody>';
        // output data of each row fg
        while($row = $result->fetch_assoc()) {
            echo '<tr><td>' . $row["Kurskod"] . '</td><td>' . $row["Kursnamn"] . '</td><td>' . $row["Anmälningskod"] . '</td><td>' . $row["Hastighet"] . '</td><td>' . $row["Högskolepoäng"] . '</td><td>'. $row["Datum"] . '</tr>';
  
        }
        echo '</tbody></table>';
    } else {
        echo '<div class="alert alert-warning" role="alert">Inga resultat.</div>';
    }

    $conn->close(); ?>
