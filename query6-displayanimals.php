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
            $shelter_id = $_POST["telephone_number"];
            $dbh = new PDO('mysql:host=localhost;dbname=animal_database', "root", "");
            $adoption_agency_check = $dbh->query("select telephone_number from adoption_agency where telephone_number = '$shelter_id'");
            if ($adoption_agency_check->rowCount() > 0) {
                $available_animals = $dbh->query("select ID, animal_name, species, entry_date from animal where most_recent_carer = '$shelter_id' and adopter_surname is NULL");
                if ($available_animals->rowCount() > 0) {
                    echo "<h2>Available Animals</h2><tr><th>Animal ID</th><th>Animal Name</th><th>Animal Species</th><th>Entry Date into System</th><th></th></tr>";
                    foreach($available_animals as $available_animal) {
                        echo "<tr><td>".$available_animal[0]."</td><td>".$available_animal[1]."</td><td>".$available_animal[2]."</td><td>".$available_animal[3]."</td><td><form action='query6-adoptioninfo.php' method='post'><input type='hidden' value='$available_animal[0]' name='animal_id'><input type='hidden' value='$shelter_id' name='current_carer'><button type='submit'>Adopt</button></form></td></tr>";
                    }
                }
                else {
                    echo "<p>There are no animals available for adoption at this organization.</p><a href='query6.html'><button class='custom-button'><h4>Try Again</h4></button></a>";
                }
            }
            else {
                echo "<p>There is no known adoption agency with that telephone number</p><a href='query6.html'><button class='custom-button'><h4>Try Again</h4></button></a>";
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>


