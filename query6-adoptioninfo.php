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
              echo "<h3>Adopter Information:</h3>
                    <form action='query6-adopt.php' method='post'>
                      <h5 class='field-title'>Surname:</h5>
                      <input type='text' name='adopter_surname'>
                      <h5 class='field-title'>Street Name:</h5>
                      <input type='text' name='street_name'>
                      <h5 class='field-title'>Street Number:</h5>
                      <input type='text' name='street_num'>
                      <h5 class='field-title'>City:</h5>
                      <input type='text' name='adopter_city'>
                      <h5 class='field-title'>Country:</h5>
                      <input type='text' name='adopter_country'>
                      <h5 class='field-title'>Postal Code:</h5>
                      <input type='text' name='postal_code'>
                      <h5 class='field-title'>Telephone Number:</h5>
                      <input type='text' name='telephone_number'>
                      <h5 class='field-title'>Payment Amount:</h5>
                      <input type='text' name='payment_amount'>
                      <input type='hidden' name='animal_id' value='$animal_id'>
                      <input type='hidden' name='current_carer' value='$current_carer'></br>
                      <button class='custom-submit-button' type='submit'>Complete Adoption</button>
                    </form>";
              ?>
            </div>
        </div>
    </div>
  </body>
</html>