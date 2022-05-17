<?php
require 'session.php';
// hier word gekeken of er iets gesubmit is
if (isset($_POST['submit'])) {
    require_once 'config.php';

    // hier word de informatie van de vorige pagina uit het formulier gehaald
    // en in de opdracht daaronder word het in de database geupdate

    $reis_id = $_POST['reis_id'];
    $titel = $_POST['titel'];
    $omschrijving = $_POST['omschrijving'];
    $bestemming = $_POST['bestemming'];
    $begin_datum = $_POST['begin_datum'];
    $eind_datum = $_POST['eind_datum'];
    $max_inschrijvingen = $_POST['max_inschrijvingen'];

    $opdracht = "UPDATE `reis` SET `titel`='$titel',`bestemming`='$bestemming',`omschrijving`='$omschrijving',`begin_datum`='$begin_datum',
                  `eind_datum`='$eind_datum',`max_inschrijvingen`='$max_inschrijvingen' WHERE `reis_id` = '$reis_id'";
    header("location:vakantie_detail.php?reis_id=$reis_id");
    $result = mysqli_query($mysqli, $opdracht);

}

if (isset($_POST['delete'])) {
    require_once 'config.php';

    //hier gebeurd hetzelfde als hierboven alleen dan is de opdracht om hetgene in de database te deleten

    $reis_id = $_POST['reis_id'];
    $titel = $_POST['titel'];
    $omschrijving = $_POST['omschrijving'];
    $bestemming = $_POST['bestemming'];
    $begin_datum = $_POST['begin_datum'];
    $eind_datum = $_POST['eind_datum'];
    $max_inschrijvingen = $_POST['max_inschrijvingen'];

    $opdracht = "DELETE FROM `reis` WHERE `reis_id` = '$reis_id'";
    header("location:vakanties.php");
    $result = mysqli_query($mysqli, $opdracht);

}