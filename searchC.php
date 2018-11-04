<?php require("includes/header.php"); ?>
<h1>Sök bland kurser</h1>
<p />
<?php require("includes/menu_buttons.php"); 
        echo '<br><input type="text" id="myInput" placeholder="Sök efter kurser..."><button id="sbutton">Sök</button>';
?>
<p />
<div id="result">
 <?php $result = $conn->query("SELECT * FROM Kurs");
    if ($result->num_rows > 0) {

        echo '<table class="table table-bordered table-hover" id="myTable">';
        echo '<thead><tr><th>Kurskod</th><th>Kursnamn</th><th>Anmälningskod</th><th>Hastighet</th><th>Högskolepoäng</th><th>Datum</th></tr></thead><tbody>';
        // output data of each row fg
        while($row = $result->fetch_assoc()) {
            echo '<tr><td>' . $row["Kurskod"] . '</td><td>' . $row["Kursnamn"] . '</td><td>' . $row["Anmälningskod"] . '</td><td>' . $row["Hastighet"] . '</td><td>' . $row["Högskolepoäng"] . '</td><td>'. $row["Datum"] . '</tr>';
  
        }
        echo '</tbody></table>';
    } else {
        echo '<div class="alert alert-warning" role="alert">Vi hittade tyvärr inga län i vår databas. Vänligen kontakta ansvarig.</div>';
    }

    $conn->close(); ?>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    $("#sbutton").click(function(){
        s1 = $("#myInput").val();
        $("#result").load("s_C.php?search=" + s1 );  
    });
});
</script>
</body>  
</html>