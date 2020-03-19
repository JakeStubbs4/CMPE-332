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
          <table class="custom-table">
            <?php
            $dbh = new PDO('mysql:host=localhost;dbname=animal_database', "root", "");
            $numRescues2018 = $dbh->query("
              select count(ID)
              from 
                (select animal_id as ID
                from animal_transfer
                where year(transfer_date) = 2018) 2018rescues;
              ");
            foreach ($numRescues2018 as $num) {
              if ($num[0] > 0) {
                echo "<p>In 2018, the total number of rescued animals was: <h4>".$num[0]."</h4></p>";
              } else {
              echo "<p>No animal was recued by a rescue organization in 2018.</p>";
              }
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>


