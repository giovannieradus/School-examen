<?php require 'session.php';
?>
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
<?php include 'navbar.php';?>
<div class="pt-5 container">
<?php
echo $_SESSION['level'];
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
      <div class='content-details fadeIn-top'>
        <h1>" . $item['titel'] . "</h1>
        <p>" . $item['omschrijving'] . "</p>        
        <h3 class='fst-italic'>" . $item['bestemming'] . "</h3>
        <p class='fw-bold'>" . $item['begin_datum'] . " - " . $item['eind_datum'] . "  </p>
        <a href='vakantie_inschrijf.php?reis_id=" . $item['reis_id'] . "' class='btn btn-primary bg-orange'>Schrijf je in</a>
       
  </div>
  </div>
";
        if($_SESSION['level'] == 2){
                    echo "
            <div class='form-group'>
                            <label for='password' class='text-dark'>Titel:</label><br>
                            <input type='text' value=' " . $item['titel'] ."' name='titel' id='opmerking' class='form-control'>
                        </div>
                                <div class='form-group'>
                            <label for='password' class='text-dark'>Omschrijving:</label><br>
                            <input type='text' value=' " . $item['omschrijving'] ."' name='omschrijving' id='omschrijving' class='form-control'>
                        </div>
";
        }
    }
}

?>