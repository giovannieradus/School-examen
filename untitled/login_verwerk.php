<?php
if (isset($_POST['Inlog'])){

    require_once 'config.php';

    $student_id = $_POST['student_id'];
    $wachtwoord = $_POST['wachtwoord'];


    $opdracht = " SELECT * FROM student WHERE student_id = '$student_id' 
AND wachtwoord = '$wachtwoord'";

//    hier check ik of de login gegevens kloppen van wat de user heb ingevoerd

    $result = mysqli_query($mysqli, $opdracht);


    if (mysqli_num_rows($result) > 0)
    {
//      Hier start ik de session dit zodat ik altijd deze gegevens kan ophalen in de website
        session_start();
        $_SESSION['student_id']  = $student_id;
        $_SESSION['level'] = mysqli_fetch_array($result)['level'];

// hier wordt je doorgestuurd naar de nieuwe pagina
        header("location:vakanties.php");

    }
    else
    {
        header("location:login.php");
    }

}

?>