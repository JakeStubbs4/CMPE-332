<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <link href="custom-style.css" type="text/css" rel="stylesheet">
  </head>

  <body>
    <div class="container-fluid">
      <div class="row" id="banner">
        <h2 class="banner-title">DATABASES ASSIGNMENT</h1>
      </div>
      <div class="row">
        <div class="col-md-auto sidebar" id="dashboard">
          <h2 class="dashboard-title">ACTIONS</h1>
          <a href="query1.html"><button class="custom-button"><h4>Display Animal Information</h4></button></a></br>
          <a href="query2.html"><button class="custom-button"><h4>Transfer an Animal</h4></button></a></br>
          <a href="query3.html"><button class="custom-button"><h4>Get Driver Information</h4></button></a></br>
          <a href="query4.html"><button class="custom-button"><h4>Get Donor Information</h4></button></a></br>
          <a href="query5.html"><button class="custom-button"><h4>Get Donation Amount</h4></button></a></br>
          <a href="query6.html"><button class="custom-button"><h4>Adopt a Pet</h4></button></a></br>
          <a href="query7.php"><button class="custom-button"><h4>Display Special Animals</h4></button></a></br>
          <a href="query8.php"><button class="custom-button"><h4>Display Number of Rescued Animals</h4></button></a></br>
        </div>
        <div class="col-md main" id="content">
          <?php
          $animal_id = $_POST["animal_id"];
          $to_id = $_POST["to_id"];
          $dbh = new PDO('mysql:host=localhost;dbname=animal_database', "root", "");
          $animal_names = $dbh->query("select animal_name from animal where ID = '$animal_id'");
          if ($animal_names->rowCount() > 0) {
            $adoption_agency_check = $dbh->query("select telephone_number from adoption_agency where telephone_number = '$to_id'");
            if ($adoption_agency_check->rowCount() > 0) {
              $rows = $dbh->exec("update animal set most_recent_carer = '$to_id' where ID = '$animal_id'");
              foreach($animal_names as $name) {
                  echo "<p>Successfully transfered ".$name[0]." to a new shelter.</p>";
              }
            }
            else {
              echo "<p>You have entered an invalid location.</p><a href='query2.html'><button class='custom-button'><h4>Try Again</h4></button></a>";
            }
          }
          else {
            echo "<p>There is no animal with the given ID.</p><a href='query2.html'><button class='custom-button'><h4>Try Again</h4></button></a>";
          }
          $dbh = null;
          ?>
        </div>
      </div>
    </div>
  </body>
</html>