<?php
session_start();
// Via Session destroy word je uitgelogd
session_destroy();
// terug naar de indexpagina
header("location:index.php");ß
?>