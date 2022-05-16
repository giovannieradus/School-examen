<?php
if (isset($_POST['Inlog'])){

    require_once 'config.php';

    $Username = $_POST['student_id'];
    $Password = $_POST['wachtwoord'];


    $opdracht = " SELECT * FROM student WHERE student_id = '$Username' 
AND wachtwoord = '$Password'";

    $result = mysqli_query($mysqli, $opdracht);


    if (mysqli_num_rows($result) > 0)
    {
        session_start();
        $_SESSION['student_id']  = $Username;
        $_SESSION['level'] = mysqli_fetch_array($result)['level'];


        header("location:vakanties.php");
        echo $opdracht;
        echo $_SESSION['student_id'];
    }
    else
    {
        echo $opdracht;
    }

}

?>