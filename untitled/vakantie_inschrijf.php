<?php require 'session.php'; ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>reizen</title>
        <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="custom/css.css">
    </head>
    <body>
    <!-- De Navbar -->
    <nav class="navbar bg-orange">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold blue" href="#">Ga Lekker Reizen</a>
        </div>
    </nav>
    <div class="pt-5 container">

<?php

require_once 'config.php';
$ID = $_GET[reis_id];
$query = "SELECT * FROM `reis` WHERE reis_id = " . $ID;;
$result = mysqli_query($mysqli, $query);
if (mysqli_num_rows($result) == 0) {
    echo "<p>Er zijn geen resultaten gevonden.</p>";
}
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
     <form id='login-form' class='form' action='login_verwerk.php' method='post'>
                        <div class='form-group'>
                            <input type='hidden' value='" . $_SESSION['student_id'] . "' name='student_id' id='student_id' class='form-control'>
                        </div>
                            <div class='form-group'>
                            <input type='hidden' value='" . $_GET[reis_id] . "' name='reis_id' id='reis_id' class='form-control'>
                        </div>
                           
                        <div class='form-group'>
                            <label for='password' class='text-dark'>Identiteit:</label><br>
                            <input type='text' name='identiteit' id='identiteit' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label for='password' class='text-dark'>Opmerkingen:</label><br>
                            <input type='text' name='opmerkingen' id='opmerkingen' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <input type='submit' name='Inlog' class='btn btn-light btn-md' value='Schrijf In'>
                        </div>

                    </form>
        </div>
        ";}
}
?>