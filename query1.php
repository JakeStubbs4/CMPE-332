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
            $spca_telephone_number = $_POST["spca_telephone_number"];
            $dbh = new PDO('mysql:host=localhost;dbname=animal_database', "root", "");
            $rows = $dbh->query("
              select animal.ID, animal.animal_name, animal.species, animal.entry_date
              from animal, spca
              where spca.telephone_number = animal.most_recent_carer and spca.telephone_number = '$spca_telephone_number' and animal.adopter_surname is null;
            ");
            if ($rows->rowCount() > 0) {
              echo "<tr><th>Aminal ID</th><th>Animal Name</th><th>Animal Species</th><th>Entry Date into System</th></tr>";
              foreach($rows as $row){
                echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
              }
            } else {
              $validSPCA = $dbh->query("
                  select telephone_number
                  from spca
                  where telephone_number = '$spca_telephone_number';
              ");
              if ($validSPCA->rowCount() == 0) {
                echo "<p>You have entered an invalid SPCA Branch telephone number.</p><a href='query1.html'><button class='custom-button'><h4>Try Again</h4></button><a>";
              } else {
                echo "<p>No animals are currently housed at the SPCA brach with telephone number $spca_telephone_number.</p>";
              }
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>


