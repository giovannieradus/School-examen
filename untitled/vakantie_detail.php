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
<body class="d-flex flex-column min-vh-100">

<?php include 'navbar.php'; ?>
<div class="pt-5 container">
    <?php
    require_once 'config.php';
    $ID = $_GET[reis_id];
    // hier maak ik de eerste opdracht, ik geef hem de opdracht om te kijken hoeveel plekken bezet zijn
    $opdracht1 = "SELECT COUNT(`reis_id`) as total FROM `inschrijving` WHERE `reis_id` = '$ID'";
    $result1 = mysqli_query($mysqli, $opdracht1);
    $data1 = mysqli_fetch_assoc($result1);
    $aantal1 = $data1['total'];

    $query = "SELECT * FROM `reis` WHERE reis_id = " . $ID;;
    $result = mysqli_query($mysqli, $query);

    // hier word of er uberhaupt resultaten zijn en als die er niet zijn krijg je te horen dat er geen resultaten zijn

    if (mysqli_num_rows($result) == 0) {
        echo "<p>Er zijn geen resultaten gevonden.</p>";
    }

    //hier word de informatie uit de database gehaald en getoont op de website
    // dit gaat met een foreach dus voor elk resultaat word er een nieuw stukje code geschreven

    while ($rij = mysqli_fetch_array($result)) {
        foreach ($result as $item) {
            echo "
      
  <div class='content'>
      <div class='content-details fadeIn-top'>
        <h1>" . $item['titel'] . "</h1>
        <p>" . $item['omschrijving'] . "</p>        
        <h3 class='fst-italic'>" . $item['bestemming'] . "</h3>
        <p class='fw-bold'>" . $item['begin_datum'] . " - " . $item['eind_datum'] . "  </p>
      <p>Maximale Inschrijvingen:<span class='fw-bold'> " . $aantal1 . " / " . $item['max_inschrijvingen'] . "</span></p>        
        <a href='vakantie_inschrijf.php?reis_id=" . $item['reis_id'] . "' class='btn btn-primary bg-orange'>Schrijf je in</a>
       
  </div>
  </div>
";
            //hier word de edit en delete forum getoont en de info in het formulier gezet

            if ($_SESSION['level'] == 2) {
                echo "
<div class='py-5'>
<form id='login-form' class='form' action='vakantie_detail_bewerk.php' method='post'>
         <input type='hidden' value='" . $item['reis_id'] . "' name='reis_id'  class='form-control'>
            <div class='form-group'>
                            <label class='text-dark'>Titel:</label><br>
                            <input type='text' value='" . $item['titel'] . "' name='titel'  class='form-control'>
                        </div>
                                <div class='form-group'>
                            <label class='text-dark'>Omschrijving:</label><br>
                            <input type='text' value='" . $item['omschrijving'] . "' name='omschrijving' class='form-control'>
                        </div>
                           <div class='form-group'>
                                   <label class='text-dark'>Titel:</label><br>
                            <input type='text' value='" . $item['bestemming'] . "' name='bestemming'  class='form-control'>
                            </div>
                                <div class='form-group'>
                            <label class='text-dark'>Begin Datum:</label><br>
                            <input type='date' value='" . $item['begin_datum'] . "' name='begin_datum'  class='form-control'>
                        </div>  
                          <div class='form-group'>
                            <label class='text-dark'>Eind Datum:</label><br>
                            <input type='date' value='" . $item['eind_datum'] . "' name='eind_datum'  class='form-control'>
                        </div>  
                               <div class='form-group'>
                            <label class='text-dark'>Maximale Inschrijvingen:</label><br>
                            <input type='number' value='" . $item['max_inschrijvingen'] . "' name='max_inschrijvingen'  class='form-control'>
                        </div>  
                          <div class='form-group pt-2'>
                            <input type='submit' name='submit' class='btn btn-warning' value='Edit'>
                                              <input type='submit' name='delete' class='btn btn-danger' value='DELETE'>
                        </div>
                        </form>
                        </div>
                     
";
            }
        }
    }

    ?>
</div>
</body>
<?php include 'footer.php'; ?>
</html>