<?php
require 'session.php';
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
<!--    Dit Z    -->
        <div class="row justify-content-center">
            <div class='col-2 fw-bold pt-1'><p>Studentennummer</p></div>
            <div class='col-2 fw-bold pt-1'><p>Reis ID</p></div>
            <div class='col-2 fw-bold pt-1'><p>Identiteitsnummer</p></div>
            <div class='col-2 fw-bold pt-1'><p>Opmerking</p></div>
            <div class='col-2 fw-bold pt-1'><p></p></div>
        </div>
<?php
if($_SESSION['level'] == 1) {
//    Met deze if statement laat ik alleen alle info aan de studenten zien, van hun eigen studentennummer
    require_once 'config.php';
    $student_id = $_SESSION['student_id'];

//    hier haal ik de informatie uit de database en plaats ik het ook
    $query = "SELECT * FROM `inschrijving` WHERE `student_id` = $student_id";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) == 0) {
        echo "<p>Er zijn geen resultaten gevonden.</p>";
    }
    while ($rij = mysqli_fetch_array($result)) {
        foreach ($result as $item) {
            echo "<div class='row justify-content-center'>
<div class='col-2 pt-1'><p>" . $item['student_id'] . "</p></div>
<div class='col-2 pt-1'><p>" . $item['reis_id'] . "</p></div>
<div class='col-2 pt-1'><p>" . $item['identiteit'] . "</p></div>
<div class='col-2 pt-1'><p>" . $item['opmerking'] . "</p></div>
<div class='col-2'><a href='uitschrijf.php?student_id=" . $student_id . "&reis_id=" . $item['reis_id'] . "' name='delete' class='btn btn-danger'>Schirjf uit</a></div>
</div>

";
        }
    }
}

            if ($_SESSION['level'] == 2) {
                //    Met deze if statement laat ik alleen alle info aan de admin zien, van alle studenten
                require_once 'config.php';

                $query = "SELECT * FROM `inschrijving`";
                //    hier haal ik de informatie uit de database en plaats ik het ook

                $result = mysqli_query($mysqli, $query);
                if (mysqli_num_rows($result) == 0) {
                    echo "<p>Er zijn geen resultaten gevonden.</p>";
                }
                while ($rij = mysqli_fetch_array($result)) {
                    foreach ($result as $item) {
                        echo "<div class='row justify-content-center'>
<div class='col-2 pt-1'><p>" . $item['student_id'] . "</p></div>
<div class='col-2 pt-1'><p>" . $item['reis_id'] . "</p></div>
<div class='col-2 pt-1'><p>" . $item['identiteit'] . "</p></div>
<div class='col-2 pt-1'><p>" . $item['opmerking'] . "</p></div>
<div class='col-2'><a href='uitschrijf.php?student_id=" . $item['student_id'] . "&reis_id=" . $item['reis_id'] . "' name='delete' class='btn btn-danger'>Schirjf uit</a></div>
</div>

";
                    }
                }
            }


?>