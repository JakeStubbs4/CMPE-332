<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <link href="custom-style.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row" id="banner">
        <h2 class="banner-title">RESCUE ANIMAL DATABASE</h1>
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
          $organization_tele = $_POST["telephone_number"];
          $donation_year = $_POST["donation_year"];
          $dbh = new PDO('mysql:h ost=localhost;dbname=animal_database', "root", "");
          $organizations = $dbh->query("select count(telephone_number) from organization where telephone_number = '$organization_tele'");
          foreach($organizations as $organization_count) {
            if ($organization_count[0] > 0) {
              $donation_info = $dbh->query("
                select sum(amount) 
                from 
                  (select amount 
                   from donation 
                   where branch_telephone = '$organization_tele' and YEAR(donation_date) = '$donation_year') 2018donations;
              ");
              foreach($donation_info as $donation) {
                if ($donation[0] > 0) {
                  $organization_name = $dbh->query("select organization_name from organization where telephone_number = '$organization_tele'");
                  foreach($organization_name as $name) {
                    echo "<p>In ".$donation_year.", the total amount donated to ".$name[0]." was: <h4>$".$donation[0]."</h4></p>";
                  }
                } else {
                  $organization_name = $dbh->query("select organization_name from organization where telephone_number = '$organization_tele'");
                  foreach($organization_name as $name) {
                    echo "<p>In ".$donation_year.", the total amount donated to ".$name[0]." was: <h4>$0.00</h4></p>";
                  }
                }
              }
            } else {
              echo "<p>There is no known organization with that telephone number.</p><a href='query5.html'><button class='custom-button'><h4>Try Again</h4></button></a>";
            }
          }
          $dbh = null;
          ?>
        </div>
      </div>
    </div>
  </body>
</html>