<?php require 'session.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Ga Lekker Reizen</title>
        <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="custom/css.css">
    </head>
    <body>
    <!-- De Navbar -->
<?php include 'navbar.php';?>
    <div class="pt-5 container">

<?php

require_once 'config.php';

//hier haal ik de id uit de url

$ID = $_GET[reis_id];
$query = "SELECT * FROM `reis` WHERE reis_id = " . $ID;;
$result = mysqli_query($mysqli, $query);

// hier word of er uberhaupt resultaten zijn en als die er niet zijn krijg je te horen dat er geen resultaten zijn

if (mysqli_num_rows($result) == 0) {
    echo "<p>Er zijn geen resultaten gevonden.</p>";
}

// hier zet ik de id's in hidden inputs zodat die niet veranderd kunnen worden maar word wel meegegeven aan de form action

while ($rij = mysqli_fetch_array($result)) {
    foreach ($result as $item) {
        echo "
      
  <div class='content'>
  <div class='row'>
      <div class='col-12'>
        <h1>" . $item['titel'] . "</h1>
        <p>" . $item['omschrijving'] . "</p>
        </div>
        </div>
             <div class='d-flex justify-content-center'>
     <form id='login-form' class='form' action='vakantie_inschrijf_verwerk.php' method='post'>
                        <div class='form-group'>
                            <input type='hidden' value='" . $_SESSION['student_id'] . "' name='student_id' id='student_id' class='form-control'>
                        </div>
                            <div class='form-group'>
                            <input type='hidden' value='" . $item['reis_id'] . "' name='reis_id' id='reis_id' class='form-control'>
                        </div>
                           
                        <div class='form-group'>
                            <label for='password' class='text-dark'>Identiteit:</label><br>
                            <input type='text' name='identiteit' id='identiteit' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label for='password' class='text-dark'>Opmerkingen:</label><br>
                            <input type='text' name='opmerking' id='opmerking' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <input type='submit' name='submit' class='btn btn-light btn-md' value='Schrijf In'>
                        </div>

                    </form>
        </div>
        ";}
}
?>