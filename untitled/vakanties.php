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
    <div class="row">
    <?php

    require_once 'config.php';

    $query = "SELECT * FROM `reis`" ;
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) == 0)
    {
        echo "<p>Er zijn geen resultaten gevonden.</p>";
    }
    while ($rij = mysqli_fetch_array ($result) )
    {
        foreach ($result as $item) {
            echo "
<div class='col-4'>
        <div class='card p-4'>
  <div class='content'>
      <div class='content-details fadeIn-top'>
        <h2>" . $item['titel'] . "</h2>
        <span class='fst-italic'>" . $item['bestemming'] . "</span>
        <p class='fw-bold'>" . $item['begin_datum'] . " - " . $item['eind_datum'] . "  </p>
        <a href='vakantie_detail.php?reis_id=" .$item['reis_id'] ."' class='btn btn-primary bg-orange'>Meer Info</a>
        
        
    
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
<script src="/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>