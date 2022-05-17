<?php
require_once 'config.php';
require 'session.php';

//hier word alles ingelezen uit het formulier en met een opdracht in de database gezet

$titel = $_POST['titel'];
$omschrijving = $_POST['omschrijving'];
$bestemming = $_POST['bestemming'];
$begin_datum = $_POST['begin_datum'];
$eind_datum = $_POST['eind_datum'];
$max_inschrijvingen = $_POST['max_inschrijvingen'];

$opdracht = "INSERT INTO `reis`(`reis_id`, `titel`, `bestemming`, `omschrijving`, `begin_datum`, `eind_datum`, `max_inschrijvingen`) VALUES
            (NULL,'$titel','$bestemming','$omschrijving','$begin_datum','$eind_datum','$max_inschrijvingen')";

// hier word de daadwerkelijke opdracht uitgevoerd via mysql
$result = mysqli_query($mysqli, $opdracht);

header("location:vakanties.php");