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
              $current_carer = $_POST["current_carer"];
              $adopter_surname = $_POST["adopter_surname"];
              $street_name = $_POST["street_name"];
              $street_num = $_POST["street_num"];
              $adopter_city = $_POST["adopter_city"];
              $adopter_country = $_POST["adopter_country"];
              $postal_code = $_POST["postal_code"];
              $telephone_number = $_POST["telephone_number"];
              $payment_amount = $_POST["payment_amount"];
              $adopter_insert = "insert into adopter values ('$adopter_surname', '$street_name', '$street_num', '$adopter_city', '$adopter_country', '$postal_code', '$telephone_number')";              ;
              $adoption_transaction = "insert into adoption_transaction values ('$animal_id', CURDATE(), '$payment_amount', '$current_carer', '$adopter_surname')";
              $dbh = new PDO('mysql:host=localhost;dbname=animal_database', "root", "");
              $adopter_query = $dbh->exec($adopter_insert);
              $adoption_query = $dbh->exec($adoption_transaction);
              $animal_query = $dbh->exec("update animal set adopter_surname = '$adopter_surname' where animal.ID = '$animal_id'");
              echo "<p>Adoption successfully processed.</p>";
              ?>
            </div>
        </div>
    </div>
  </body>
</html>