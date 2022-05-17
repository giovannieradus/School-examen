<?php
//de sessie word op elke pagina gestart en checkt of iemand een sessie nodig hebt om de pagina te bezoeken
session_start();
if(!isset($_SESSION['student_id']))
{
    header("location:login.php");
}
?>
