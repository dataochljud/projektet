<?php require("includes/open_database.php"); ?>
<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<title>Kursadmin</title>
<link rel = "stylesheet" type = "text/css" href = "kursadmin.css" />
</head>
<body>
<h1>Sök kurserplaner</h1>
<a href="searchC.php" class="btn btn-primary" role="button">Sök bland kurser</a>
<a href="regC.php" class="btn btn-primary disabled" role="button">Registrera kurs</a>
 <?php $result = $conn->query("SELECT * FROM Kursplan");
    if ($result->num_rows > 0) {
        echo '<input type="text" id="searchCP" onkeyup="myFunction()" placeholder="Sök efter kursplan...">';
        echo '<table class="table table-bordered table-hover" id="kursplanTable">';
        echo '<thead><tr><th>Kurskod</th><th>Schema</th><th>Antal inlämingsuppgifter</th></tr></thead><tbody>';
        // output data of each row fg
        while($row = $result->fetch_assoc()) {
            echo '<tr><td>' . $row["Kurskod"] . '</td><td>' . $row["Schema"] . '</td><td>' . $row["Antal_inlämningsuppgifter"] . '</td></tr>';
  
        }
        echo '</tbody></table>';
    } else {
        echo '<div class="alert alert-warning" role="alert">Vi hittade tyvärr inga län i vår databas. Vänligen kontakta ansvarig.</div>';
    }

    $conn->close(); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td_f = tr[i].getElementsByTagName("td");
    for (j = 0; j < td_f.length; j++) {
        td = td_f[j];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
  }
}
</script>
</body>  
</html>