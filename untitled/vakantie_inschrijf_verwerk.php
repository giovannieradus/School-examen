<?php

if (isset($_POST['Inlog'])) {

    require_once 'config.php';
    $reis_id = $_POST['reis_id'];
    $student_id = $_POST['student_id'];
    $identiteit = $_POST['identiteit'];
    $opmerking = $_POST['opmerking'];

    $opdracht1 = "SELECT COUNT(`reis_id`) as total FROM `inschrijving` WHERE `reis_id` = '$reis_id'";
    $opdracht2 = "SELECT `max_inschrijvingen` FROM `reis` WHERE `reis_id` = '$reis_id'";

    $result1 = mysqli_query($mysqli, $opdracht1);
    $data1 = mysqli_fetch_assoc($result1);
    $aantal1 = $data1['total'];

    $result2 = mysqli_query($mysqli, $opdracht2);
    $data2 = mysqli_fetch_assoc($result2);
    $aantal2 = $data2['max_inschrijvingen'];

    if ($aantal1 >= $aantal2) {
        echo 'sorry we zitten vol';
    } else {
        $opdracht = "INSERT INTO `inschrijving`
VALUES ('$reis_id','$student_id', '$identiteit', '$opmerking')";
        echo $opdracht;
        $result = mysqli_query($mysqli, $opdracht);
    }
}

