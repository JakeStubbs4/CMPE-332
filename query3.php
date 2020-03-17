<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <link href="custom-style.css" type="text/css" rel="stylesheet">
  </head>

  <body>
    <div class="row" id="banner">
      <h2 class="banner-title">DATABASES ASSIGNMENT</h1>
    </div>
    <div class="row">
      <div class="col-md-auto sidebar" id="dashboard">
        <h2 class="dashboard-title">ACTIONS</h1>
        <a href="query1.php"><button class="custom-button"><h4>Display Animal Information</h4></button></a></br>
        <a href="query2.html"><button class="custom-button"><h4>Transfer an Animal</h4></button></a></br>
        <a href="query3.html"><button class="custom-button"><h4>Get Driver Information</h4></button></a></br>
        <a href="query4.html"><button class="custom-button"><h4>Get Donor Information</h4></button></a></br>
        <a href="query5.html"><button class="custom-button"><h4>Get Donation Amount</h4></button></a></br>
        <a href="query6.html"><button class="custom-button"><h4>Adopt a Pet</h4></button></a></br>
        <a href="query7.php"><button class="custom-button"><h4>Display Special Animals</h4></button></a></br>
        <a href="query8.php"><button class="custom-button"><h4>Display Number of Rescued Animals</h4></button></a></br>
      </div>
      <div class="col-md main" id="content">
        <table class="custom-table">
            <tr><th>Driver Name</th><th>Telephone Number</th><th>License Number</th><th>Plate Number</th><th>Rescue Organization</th></tr>
            <?php
                $organization_id = $_POST["organization_id"];
                $dbh = new PDO('mysql:h ost=localhost;dbname=animal_database', "root", "");
                $rescue_organizations = $dbh->query("select count(telephone_number) from rescue_organization where telephone_number = '$organization_id'");
                foreach($rescue_organizations as $rescue_organization) {
                  if ($rescue_organization[0] > 0) {
                      $drivers_info = $dbh->query("select * from driver where rescue_organization = '$organization_id'");
                      foreach($drivers_info as $driver) {
                          echo "<tr><td>".$driver[0]."</td><td>".$driver[1]."</td><td>".$driver[2]."</td><td>".$driver[3]."</td><td>".$driver[4]."</td></tr>";
                      }
                  }
                  else {
                      echo "<p>You have entered an invalid Rescue Organization ID.</p><a href='query3.html'><button class='custom-button'><h4>Enter a new Prganization</h4></button><a>";
                  }
                }
                $dbh = null;
            ?>
        </table>
      </div>
    </div>
  </body>
</html>