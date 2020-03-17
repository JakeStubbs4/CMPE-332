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
          <h2>Animals in SPCA</h2>
          <table class="custom-table">
            <tr><th>Aminal ID</th><th>Animal Name</th><th>Animal Species</th><th>Entry Date into System</th></tr>
            <?php
            $dbh = new PDO('mysql:host=localhost;dbname=animal_database', "root", "");
            #user name and password for mysql when using XAMPP is "root" and a blank password
            $rows = $dbh->query("
              select animal.ID, animal.animal_name, animal.species, animal.entry_date
              from animal, spca
              where spca.telephone_number = animal.most_recent_carer and animal.adopter_surname is null;
              ");
            foreach($rows as $row){
              echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>


