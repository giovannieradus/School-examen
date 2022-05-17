<?php require 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ga Lekker Reizen</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom/css.css">
</head>
<body class="d-flex flex-column min-vh-100">
<!-- De Navbar -->
<?php include 'navbar.php';?>

<div class="py-4 container">
    <div class="row">

    <!--  hier lees ik alle vakanties uit, uit  de database  -->
        <?php
    require_once 'config.php';

    $query = "SELECT * FROM `reis`" ;
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) == 0)
    {
        echo "<p>Er zijn geen resultaten gevonden.</p>";
    }
    while ($rij = mysqli_fetch_array ($result) ) {
        foreach ($result as $item) {

//            hier maak ik de kaart aan voor elke vakantie die, door een middel van een foreach
            echo "
<div class='col-12 col-md-4'>
        <div class='card p-4 mt-3'>
  <div class='content'>
      <div class='content-details fadeIn-top'>
        <h2>" . $item['titel'] . "</h2>
        <span class='fst-italic'>" . $item['bestemming'] . "</span>
        <p class='fw-bold'>" . $item['begin_datum'] . " - " . $item['eind_datum'] . "  </p>
        <a href='vakantie_detail.php?reis_id=" . $item['reis_id'] . "' class='btn btn-primary bg-orange'>Meer Info</a>
        
    
                </div>
    </a>
             </div>
        </div>
   </div>
";
        }
    }

    ?>

    </div>
</div>
</body>
<?php include 'footer.php';?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>