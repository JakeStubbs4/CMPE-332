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
                <?php
                $organization_tele = $_POST["telephone_number"];
                $dbh = new PDO('mysql:h ost=localhost;dbname=animal_database', "root", "");
                $organizations = $dbh->query("select count(telephone_number) from organization where telephone_number = '$organization_tele'");
                foreach($organizations as $organization_count) {
                    if ($organization_count[0] > 0) {
                        $donation_info = $dbh->query("select branch_telephone, donation_date, sum(amount) from donation group by branch_telephone having branch_telephone = '$organization_tele' and YEAR(donation_date) = '2018'"); 
                        if ($donation_info->rowCount() > 0) {
                            foreach($donation_info as $donation) {
                                $organization_name = $dbh->query("select organization_name from organization where telephone_number = '$organization_tele'");
                                foreach($organization_name as $name) {
                                    echo "<p>In 2018, the total amount donated to ".$name[0]." was: <h4>$".$donation[2]."</h4></p>";
                                }
                            }
                        }
                        else {
                            $organization_name = $dbh->query("select organization_name from organization where telephone_number = '$organization_tele'");
                            foreach($organization_name as $name) {
                                echo "<p>In 2018, the total amount donated to ".$name[0]." was: <h4>$0.00</h4></p>";
                            }
                        }
                    }
                    else {
                        echo "<p>There is no known organization with that telephone number.</p><a href='query5.html'><button class='custom-button'><h4>Enter a new Organization</h4></button><a>";
                    }
                }
                $dbh = null;
                ?>
            </div>
        </div>
    </div>
  </body>
</html>