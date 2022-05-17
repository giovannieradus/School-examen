<?php
// hier roep ik de sessie en de config voor de database aan

require 'session.php';
require_once 'config.php';

// hier worden de id's uit de url gehaald

$reis_id = $_GET['reis_id'];
$student_id = $_GET['student_id'];

// in deze if statement zeg ik dat je dit alleen mag uitvoeren als je admin bent of als je het je eigen studentennummer is
if($student_id == $_SESSION['student_id'] OR $_SESSION['level'] == '2') {

    $opdracht = "DELETE FROM `inschrijving` WHERE `reis_id` = '$reis_id' AND `student_id` = '$student_id'";
    header("location:inschrijvingen.php");
    $result = mysqli_query($mysqli, $opdracht);
}
else{
    echo 'geen toegang';
}